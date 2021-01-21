@extends('admin.layouts.app')

@section('title')
    Create New Admin
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Basic form</h4>
            <form action="{{ route('admin.store') }}" method="POST">
                @csrf

               {{-- NAME  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Admin Name</label>
                    <input type="text" class="form-control" placeholder="Admin Name" name="name">
                    @error("name")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {{-- EMAIL  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" placeholder="Enter email" name="email">
                    @error("email")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {{-- PASSWORD  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    @error("password")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {{-- CONFERM PASSWORD --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Confirem Password</label>
                    <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password">
                    @error("confirm-password")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {{-- PHONE --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                    @error("phone")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {{-- ROLES NAME --}}
                <div>
                    <select name="role_id[]" multiple class="form-control">
                        @foreach ($roles as $role)
                        <option value={{ $role->id }} >
                            {{ $role->name }}
                        </option>
                        @endforeach
                    </select>
                   

                    </div>
                </div>  

                 {{-- STATUS --}}
                 <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select name="status" id="select-beast" class="form-control  nice-select  custom-select">
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