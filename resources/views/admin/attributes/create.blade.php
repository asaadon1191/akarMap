@extends('admin.layouts.app')

@section('title')
    Create New Attribute
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Basic form</h4>
            <form action="{{ route('Attribute.store') }}" method="POST">
                @csrf

               {{-- NAME  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Attribute Name</label>
                    <input type="text" class="form-control" placeholder="Attribute Name" name="name">
                    @error("name")
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