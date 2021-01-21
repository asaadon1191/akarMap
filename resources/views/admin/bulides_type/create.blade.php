@extends('admin.layouts.app')

@section('title')
    Create New Building Type
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Basic form</h4>
            <form action="{{ route('BuildingType.store') }}" method="POST">
                @csrf

            {{-- NAME  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">BuildingType Name</label>
                    <input type="text" class="form-control" placeholder="BuildingType Name" name="name">
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
                            checked/>
                        <label for="switcheryColor4"
                            class="card-title ml-1">Status 
                        </label>
                        @error("is_active")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
            </form>
        </div>
    </div>   
@endsection