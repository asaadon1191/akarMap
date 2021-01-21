@extends('admin.layouts.app')

@section('title')
     Update City
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">{{ $city->name }}</h4>
            <form action="{{ route('city.update',$city->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- HIDDEN INPUT ID  --}}
                <div class="form-group">
                    <input type="hidden" class="form-control"name="id" value="{{ $city->cityTranslate->pluck('id')->implode(', ') }}">   
                </div>

               {{-- NAME  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">City Name</label>
                    <input type="text" class="form-control" placeholder="City Name" name="name" value="{{ $city->name }}">
                    @error("name")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>     
                
                
               {{-- GOVERNORATE ID  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Governorate Name</label>
                    <select name="governorate_id" class="form-control">
                        @foreach ($governorates as $gov)
                            <option value="{{ $gov->id }}" @if ($gov->id == $city->governorate_id)
                                selected
                            @endif>
                                {{ $gov->name }}
                            </option>
                        @endforeach
                    </select>
                    @error("governorate_id")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div> 
                
                {{-- STATUS --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select name="is_active" id="select-beast" class="form-control  nice-select  custom-select">
                        <option value="0" @if ($city->is_active == 0)
                            selected
                        @endif>Un Active</option>
                        <option value="1" @if ($city->is_active == 1)
                            selected
                        @endif> Active</option>
                    </select>
                    @error("status")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
            </form>
        </div>
    </div>   
@endsection