@extends('admin.layouts.app')

@section('title')
     Update Company 
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <img src="{{ asset('assets/admin/images/'. $company->logo) }}" alt="" style="height: 100px; width:100px">
            </div>
            <h4 class="header-title">Update Company {{ $company->name }}</h4>
            <form action="{{ route('company.update',$company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

               {{-- HIDDEN INPUT ID  --}}
                <div class="form-group">
                    <input type="hidden" class="form-control"name="id" value="{{ $company->companyTranslations->pluck('id')->implode(', ') }}">   
                </div>

               {{-- NAME  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Admin Name</label>
                    <input type="text" class="form-control" placeholder="Admin Name" name="name" value="{{ $company->name }}">
                    @error("name")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {{-- ADRESS  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1"> Address</label>
                    <input type="text" class="form-control" placeholder="Enter Company Adress" name="adress" value="{{ $company->adress }}">
                    @error("adress")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {{-- PHONE  --}}
                <div class="form-group">
                    <label >Phone</label>
                    <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ $company->phone }}">
                    @error("phone")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {{-- PHONE (optional) --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone (optional)</label>
                    <input type="text" name="phone2" class="form-control" placeholder="Phone (optional)" value="{{ $company->phone2 }}">
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
                        <option value="0" @if ($company->is_active == 0)
                            selected
                        @endif>Un Active</option>
                        <option value="1" @if ($company->is_active == 1)
                            selected
                        @endif> Active</option>
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