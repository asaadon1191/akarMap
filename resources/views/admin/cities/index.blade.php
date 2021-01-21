@extends('admin.layouts.app')

@section('title')
   All Cities
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
                            <th scope="col">CITY Name</th>
                            <th scope="col">CITY STATUS</th>
                            
                            <th scope="col" >action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($cities as $key => $city)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $city->name }}</td>
                                <td>{{ $city->governorats->name }}</td>
                                <td>{{ $city->status() }}</td>
                                <td>
                                    <a href="{{ route('city.edit',$city->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    
                                    <a href="{{ route('city.show',$city->id) }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-plus-square"></i>
                                    </a>

                                    <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#exampleModalLong{{ $city->id }}">
                                        <i class="ti-trash"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalLong{{ $city->id }}" aria-hidden="true"  style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        Are You Sure You Want To Delete 
                                                        {{ $city->name }}
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="{{ route('city.destroy',$city->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" value="Delete" class="btn btn-primary">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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