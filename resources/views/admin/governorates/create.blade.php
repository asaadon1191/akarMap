@extends('admin.layouts.app')

@section('title')
    Create New Governorate
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Basic form</h4>
            <form action="{{ route('governorate.store') }}" method="POST">
                @csrf

               {{-- NAME  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Governorate Name</label>
                    <input type="text" class="form-control" placeholder="Governorate Name" name="name">
                    @error("name")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>               
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
            </form>
        </div>
    </div>   
@endsection