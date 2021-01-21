+@extends('admin.layouts.app')

@section('title')
    Update  Governorate
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">{{ $governorate->name }}</h4>
            <form action="{{ route('governorate.update',$governorate->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- HIDDEN INPUT ID  --}}
                <div class="form-group">
                    <input type="hidden" class="form-control"name="id" value="{{ $governorate->gov_translation->pluck('id')->implode(', ') }}">   
                </div>

               {{-- NAME  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Governorate Name</label>
                    <input type="text" class="form-control" placeholder="Governorate Name" name="name" value="{{ $governorate->name }}">
                    @error("name")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>               
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
            </form>
        </div>
    </div>   
@endsection
