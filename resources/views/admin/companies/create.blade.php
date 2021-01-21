@extends('admin.layouts.app')

@section('title')
    Create New Company
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Basic form</h4>
            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

               {{-- NAME  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Admin Name</label>
                    <input type="text" class="form-control" placeholder="Admin Name" name="name">
                    @error("name")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {{-- ADRESS  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1"> Address</label>
                    <input type="text" class="form-control" placeholder="Enter Company Adress" name="adress">
                    @error("adress")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {{-- PHONE  --}}
                <div class="form-group">
                    <label >Phone</label>
                    <input type="text" class="form-control" placeholder="Phone" name="phone">
                    @error("phone")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {{-- PHONE (optional) --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone (optional)</label>
                    <input type="text" name="phone2" class="form-control" placeholder="Phone (optional)">
                    @error("phone2")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {{-- LOGO --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Company Logo</label>
                    <input type="file" name="logo" class="form-control">
                    @error("logo")
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
                    @error("is_active")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

               
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
            </form>
        </div>
    </div>   
@endsection