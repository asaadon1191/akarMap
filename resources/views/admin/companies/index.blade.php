@extends('admin.layouts.app')

@section('title')
    All Companies
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
        <h4 class="header-title">All Companies</h4>
        <div class="data-tables datatable-primary">
            <div id="dataTable2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="dataTable2" class="text-center dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="dataTable2_info" style="width: 1131px;">
                            <thead class="text-capitalize">
                        <tr class="text-white">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Adress</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Admin Name</th>
                            <th scope="col">Logo </th>
                            <th scope="col">Status </th>
                            <th scope="col" >action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($companies as $key => $company)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->adress }}</td>
                                <td>{{ $company->phone }}</td>
                                <td>{{ $company->admins->pluck('name')->implode(', ') }}</td>
                                <td style="height: 100px; width: 100px;">
                                    <img src="{{ asset('assets/admin/images/'.$company->logo) }}" alt="">
                                </td>
                                <td>{{ $company->Status() }}</td>
                               
                                <td>
                                    @can('company-edit')
                                        <a href="{{ route('company.edit',$company->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('company-show')
                                        <a href="{{ route('company.show',$company->id) }}" class="btn btn-success btn-sm">
                                            <i class="fa fa-plus-square"></i>
                                        </a>
                                    @endcan
                                    @can('company-delete')
                                        <form action="{{ route('company.destroy',$company->id) }}" method="POST" class="btn btn-danger btn-sm">
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