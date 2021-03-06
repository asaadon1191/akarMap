@extends('admin.layouts.app')

@section('title')
    Update Permission {{ $permission->name }}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Basic form</h4>
            <form action="{{ route('permission.update',$permission->id) }}" method="POST">
                @csrf
                @method('PUT')

                 {{--  PERMISSION ID  --}}
                 <div class="form-group col-md-6">
                    <input type="hidden" name="id" value="{{ $permission->id }}" class="form-control">
                </div>

               {{-- NAME  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Permission Name</label>
                    <input type="text" class="form-control" placeholder="Permission Name" name="name" value="{{ $permission->name }}">
                    @error("name")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>               
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
            </form>
        </div>
    </div>   
@endsection