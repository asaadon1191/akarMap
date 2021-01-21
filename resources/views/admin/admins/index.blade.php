@extends('admin.layouts.app')

@section('title')
    Admins Index
@endsection

@section('content')
<div class="card">
    <div class="card header">
        <h1>
            @include('admin.layouts.alerts.success')
            @include('admin.layouts.alerts.errors')
        </h1>
    </div>
    <div class="card-body">
        <h4 class="header-title">Data Table Primary</h4>
        <div class="data-tables datatable-primary">
            <div id="dataTable2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="dataTable2" class="text-center dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="dataTable2_info" style="width: 1131px;">
                            <thead class="text-capitalize">
                        <tr class="text-white">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Roles</th>
                            <th scope="col" >action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($data as $admin)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->Status() }}</td>
                                {{--  @if ($admin->role && $admin->role > 0)  --}}
                                    <td>
                                        {{ $admin->rolees->name }}        
                                    </td>
                                {{--  @endif  --}}
                                
                                <td>
                                    <a href="{{ route('admin.edit',$admin->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.show',$admin->id) }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-plus-square"></i>
                                    </a>
                                    @can('delete_admins')
                                        <form action="{{ route('admin.destroy',$admin->id) }}" method="POST" class="btn btn-danger btn-sm">
                                            @csrf
                                            @method('DELETE')
                                            <button >
                                                <i class="ti-trash"></i>
                                            </button>
                                            
                                        </form> 
                                    @endcan
                                   
                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            
            </div>
        </div>
    </div>
</div>
</div>
    
@endsection