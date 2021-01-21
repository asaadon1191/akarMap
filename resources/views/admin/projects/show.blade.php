@extends('admin.layouts.app')

@section('title')
    Project Detailes
@endsection

@section('content')
<div class="card card-bordered">
    <div class="text-center">
        <h3> Project Logo</h3>
        <br>
        <img src="{{ asset('assets/admin/images/'. $project->logo) }}" alt="" style="height: 300px; width:300px">
    </div>
    <div class="card-body">
        <h5 >{{ $project->name }}</h5>
        
        <a href="{{ route('project.edit',$project->id) }}" class="btn btn-primary">Update Project....</a>
    </div>
</div>
@endsection