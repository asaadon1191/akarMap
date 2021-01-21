@extends('admin.layouts.app')

@section('title')
    All Roles
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
        <h4 class="header-title">All Building Images</h4>
        <div class="data-tables datatable-primary">
            <div id="dataTable2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="dataTable2" class="text-center dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="dataTable2_info" style="width: 1131px;">
                            <thead class="text-capitalize">
                        <tr class="text-white">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            {{--  <th scope="col">Permmsions</th>  --}}
                            <th scope="col" >action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($roles as $key => $role)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $role->name }}</td>
                                {{--  <td>
                                    {{ $role['permmsions'] }}   
                                </td>  --}}
                               
                               
                                <td>
                                    {{--  @can('role-edit')  --}}
                                        <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    {{--  @endcan  --}}
                                    {{--  @can('role-show')  --}}
                                        <a href="{{ route('roles.show',$role->id) }}" class="btn btn-success btn-sm">
                                            <i class="fa fa-plus-square"></i>
                                        </a>
                                    {{--  @endcan  --}}
                                    {{--  @can('role-delete')  --}}
                                        <form action="{{ route('roles.destroy',$role->id) }}" method="POST" class="btn btn-danger btn-sm">
                                            @csrf
                                            @method('DELETE')
                                            <button >
                                                <i class="ti-trash"></i>
                                            </button>
                                            
                                        </form>
                                    {{--  @endcan  --}}
                                   
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
</div>







    
@endsection