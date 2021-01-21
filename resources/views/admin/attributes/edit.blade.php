@extends('admin.layouts.app')

@section('title')
    Update Attribute
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Update Attribute {{ $attr->name }}</h4>
            <form action="{{ route('Attribute.update',$attr->id) }}" method="POST">
                @csrf
                @method('PUT')

                 {{-- HIDDEN INPUT ID  --}}
                 <div class="form-group">
                    <input type="hidden" class="form-control"name="id" value="{{ $attr->attributesTranslate->pluck('id')->implode(', ') }}">   
                </div>

               {{-- NAME  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Attribute Name</label>
                    <input type="text" class="form-control" placeholder="Attribute Name" name="name" value="{{ $attr->name }}">
                    @error("name")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>  
                
                 {{-- STATUS --}}
                 <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select name="is_active" id="select-beast" class="form-control  nice-select  custom-select">
                        <option value="0"@if ($attr->is_active == 0)
                            seleted
                        @endif>Un Active</option>
                        <option value="1" @if ($attr->is_active == 1)
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