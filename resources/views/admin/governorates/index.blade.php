@extends('admin.layouts.app')

@section('title')
   All Governorates
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
                            
                            <th scope="col" >action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($governorates as $key => $gov)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $gov->name }}</td>
                                <td>
                                    <a href="{{ route('governorate.edit',$gov->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('governorate.show',$gov->id) }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-plus-square"></i>
                                    </a>
                                    <form action="{{ route('governorate.destroy',$gov->id) }}" method="POST" class="btn btn-danger btn-sm">
                                        @csrf
                                        @method('DELETE')
                                        <button >
                                            <i class="ti-trash"></i>
                                        </button>
                                        
                                    </form>
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