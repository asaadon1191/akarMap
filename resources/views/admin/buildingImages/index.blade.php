@extends('admin.layouts.app')

@section('title')
    All Building Images
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
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" style="width: 140px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">
                                            ID
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" style="width: 140px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">
                                            Name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" style="width: 275px;" aria-label="Position: activate to sort column ascending">
                                             Building Images 
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" style="width: 275px;" aria-label="Position: activate to sort column ascending">
                                             Building Images Type
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
                                    @foreach ($Buildings as $building)
                                        <tr role="row" class="odd">
                                            <td>{{ $x++ }}</td>
                                            <td>{{ $building->building->translations->pluck('name')->implode(', ') }}</td>
                                            <td>{{ $building->type() }}</td>
                                            <td>
                                                <img src="{{ asset('assets/admin/images/'. $building->photos) }}" alt="" style="height: 100px; width:100px">
                                            </td>
                                            <td>
                                                @can('role-edit')
                                                    <a href="{{ route('BuildingImage.edit',$building->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('role-delete')
                                                    <form action="{{ route('BuildingImage.destroy',$building->id) }}" method="POST" class="btn btn-danger btn-sm">
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