@extends('admin.layouts.app')

@section('title')
    All Projects Images
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
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" style="width: 140px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">
                                            ID
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" style="width: 140px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">
                                            Name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" style="width: 275px;" aria-label="Position: activate to sort column ascending">
                                            Project Image
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" style="width: 136px;" aria-label="Start Date: activate to sort column ascending">
                                            Controles
                                        </th>
                                    
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @php
                                        $x = 1;
                                    @endphp
                                    @foreach ($projects as $pro)
                                        <tr role="row" class="odd">
                                            <td>{{ $x++ }}</td>
                                            <td>{{ $pro->company->translations->pluck('name')->implode(', ') }}</td>
                                            <td>
                                                <img src="{{ asset('assets/admin/images/'. $pro->photos) }}" alt="" style="height: 100px; width:100px">
                                            </td>
                                            <td>
                                                @can('role-edit')
                                                    <a href="{{ route('project_images.edit',$pro->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('role-delete')
                                                    <form action="{{ route('project_images.destroy',$pro->id) }}" method="POST" class="btn btn-danger btn-sm">
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
    </div>
@endsection