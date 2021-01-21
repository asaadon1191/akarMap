@extends('admin.layouts.app')

@section('title')
    Create New City
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Basic form</h4>
            <form action="{{ route('city.store') }}" method="POST">
                @csrf

               {{-- NAME  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">City Name</label>
                    <input type="text" class="form-control" placeholder="City Name" name="name">
                    @error("name")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>     
                
                
               {{-- GOVERNORATE ID  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Governorate Name</label>
                    <select name="governorate_id" class="form-control">
                        @foreach ($governorates as $gov)
                            <option value="{{ $gov->id }}">
                                {{ $gov->name }}
                            </option>
                        @endforeach
                    </select>
                    @error("gov_id")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>   
                
                {{-- STATUS --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select name="is_active" id="select-beast" class="form-control  nice-select  custom-select">
                        <option value="0">Un Active</option>
                        <option value="1"> Active</option>
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