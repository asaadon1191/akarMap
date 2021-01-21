@extends('admin.layouts.app')

@section('title')
    All Building Types
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
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable2" rowspan="1" colspan="1" style="width: 140px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">
                                            Status
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
                                    @foreach ($buildingTypes as $bulidibgType)
                                        <tr role="row" class="odd">
                                            <td>{{ $x++ }}</td>
                                            <td>{{ $bulidibgType->name }}</td>
                                            <td>{{ $bulidibgType->status() }}</td>
                                           
                                            <td>
                                                @can('role-edit')
                                                    <a href="{{ route('BuildingType.edit',$bulidibgType->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('role-delete')
                                                    
                                        <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#exampleModalLong{{ $bulidibgType->id }}">
                                            <i class="ti-trash"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalLong{{ $bulidibgType->id }}" aria-hidden="true"  style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            Are You Sure You Want To Delete 
                                                            {{ $bulidibgType->name }}
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form action="{{ route('BuildingType.destroy',$bulidibgType->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit" value="Delete" class="btn btn-primary">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

@section('script')
    <script>
        $(document).ready(function()
        {
            $('.btn_showModel').click(function()
            {
                $('#delete_model').modal('show');
            });

            $('.modal_close').click(function()
            {
                $('#delete_model').modal('hide');
            });
        });
    </script>
@endsection