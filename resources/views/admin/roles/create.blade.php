@extends('admin.layouts.app')

@section('title')
    Create New Role
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Basic form</h4>
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf

               {{-- NAME  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Permission Name</label>
                    <input type="text" class="form-control" placeholder="Role Name" name="name">
                    @error("name")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>          
                
                {{--  PERMMSIONS  --}}
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permission:</strong>
                        <br/>
                        @foreach(config('global.permissions') as $name => $value)
                            <input type="checkbox" name="permission[]" value="{{ $name }}">
                            {{ $value }}</label>
                            <br/>
                        @endforeach
                    </div>
                    @error("permission")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
            </form>
        </div>
        <a href="{{ route('roles.index') }}">
            <button class="btn btn-danger btn-lg">Back</button>
        </a>
    </div>   
@endsection