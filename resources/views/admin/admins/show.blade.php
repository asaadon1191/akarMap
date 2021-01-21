@extends('admin.layouts.app')

@section('title')
    Admins Show
@endsection

@section('content')
    <div class="card-body">
        <h4 class="header-title">{{ $admin->name }}</h4>
        <ul class="list-group">
            <li class="list-group-item"><strong>Email</strong> {{ $admin->email }}</li>
            <li class="list-group-item"> <strong>Phone</strong> {{ $admin->phone }}</li>
            <li class="list-group-item"><strong>Role Name</strong> 
                {{ $admin->rolees->name }} 
            </li>
            <li class="list-group-item"><strong>Permission Name</strong> 
                {{ $admin->rolees->permmsions }} 
            </li>
            
           
          
            <li class="list-group-item"> <strong>Status</strong> {{ $admin->status() }}</li>
            
        </ul>
    </div> 
<a href="{{ route('admin.index') }}">
    <button class="btn btn-danger btn-lg">Back</button>
</a>
@endsection