@extends('admin.layouts.app')

@section('title')
    Update Building Type 
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">{{ $BuildingType->name }}</h4>
            <form action="{{ route('BuildingType.update',$BuildingType->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- HIDDEN INPUT ID  --}}
                <div class="form-group">
                    <input type="hidden" class="form-control"name="id" value="{{ $BuildingType->BulidingTranslate->pluck('id')->implode(', ') }}">   
                </div>

               {{-- NAME  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">BuildingType Name</label>
                    <input type="text" class="form-control" placeholder="BuildingType Name" name="name" value="{{ $BuildingType->name }}">
                    @error("name")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>   
                
                 {{-- IS_ACTIVE  --}}
                 <div class="form-group col-md-6">
                    <div class="form-group mt-1">
                        <input type="checkbox"  value="1" 
                            name="is_active"
                            id="switcheryColor4"
                            class="switchery" data-color="success"
                            @if ($BuildingType->is_active == 1)
                                checked
                            @endif/>
                        <label for="switcheryColor4"
                            class="card-title ml-1">Status 
                        </label>
                        @error("is_active")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div> 
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
            </form>
        </div>
    </div>   
@endsection