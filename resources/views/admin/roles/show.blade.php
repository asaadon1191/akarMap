@extends('admin.layouts.app')

@section('title')
    Role Show
@endsection

@section('content')
    <div class="card-body">
        <h4 class="header-title">{{ $role->name }}</h4>
        <ul class="list-group">

            
            
           @if(!empty($role->permmsions))
           <ul>
               <li><br>{{ $role->permmsions }} <br></li>
           </ul>
            
            @endif

            
            
        </ul>
    </div> 
        <a href="{{ route('roles.index') }}">
            <button class="btn btn-danger btn-lg">Back</button>
        </a>
@endsection