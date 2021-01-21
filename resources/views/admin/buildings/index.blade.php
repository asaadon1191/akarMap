@extends('admin.layouts.app')

@section('title')
   All Buildings
@endsection

@section('content')
    <h1>All Buildings</h1> 
    
    <div class="card-body">

        <h1>
            @include('admin.layouts.alerts.success')
            @include('admin.layouts.alerts.errors')
        </h1>
       
        
        <h4 class="header-title">Thead Primary</h4>
        <div class="single-table">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead class="text-uppercase bg-primary">
                        <tr class="text-white">
                            <th scope="col">ID</th>
                            <th scope="col">Building Name</th>
                            <th scope="col">Project Name </th>
                            <th scope="col"> Total Price </th>
                            <th scope="col">Space</th>
                            <th scope="col">Status</th>
                            <th scope="col" >action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($buildings as $key => $building)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $building->name }}</td>
                                {{-- <td>{{ $building->project->pluck('name')->implode(', ') }}</td> --}}
                                <td>{{ $building->total_price }}</td>
                                <td>{{ $building->space }}</td>
                                <td>{{ $building->status() }}</td>
                                <td>
                                    <a href="{{ route('Building.edit',$building->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    
                                    <a href="{{ route('Building.show',$building->id) }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-plus-square"></i>
                                    </a>

                                    <button type="button" class="btn btn-danger btn-flat btn-sm" data-toggle="modal" data-target="#exampleModalLong{{ $building->id }}">
                                        <i class="ti-trash"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalLong{{ $building->id }}" aria-hidden="true"  style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        Are You Sure You Want To Delete 
                                                        {{ $building->name }}
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="{{ route('Building.destroy',$building->id) }}" method="POST">
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