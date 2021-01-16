@extends('layouts.admin')

@section('breadcrumb')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-auto">
                <h2>Daftar Angkatan</h2>
            </div>
            <div class="col-auto ml-auto">
                <a href="{{url('admin/addGeneration')}}"><button class="btn btn-info">Tambah + </button></a>
            </div>
        </div>
        <hr>
    </div>
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
            @if (session('msg'))
                <div class="alert alert-info">
                    {{ session('msg') }}
                </div>
            @endif
            <table class="tableAngkatan table table-responsive-sm table-bordered" cellspacing="0" width="100%">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Angkatan </th>
                        <th>Junlah Mahasiswa</th>
                        <th>Status</th>
                        <th><i class="fa fa-ellipsis-v"></i></th>
                    </tr>
                    </thead>
                    <tbody class="table-hover">
                    @foreach ($generation as $row)
                        <tr>
                            <td>{{$row->generation_id}}</td>
                            <td>{{$row->generation}}</td>
                            <td>{{$row->total_mahasiswa}}</td>
                            <td>{{$row->status}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn" style="cursor: pointer" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item " href="{{url('generationEdit/'.$row->generation_id)}}">Edit</a>
                                        <a class="dropdown-item " href="{{url('admin/setPayment/'.$row->generation_id)}}">Atur Pembayaran</a>
                                        <a class="dropdown-item " href="{{url('admin/studentList/'.$row->generation_id)}}">Daftar Mahasiswa</a>
                                        <a class="dropdown-item " href="{{url('admin/paymentList/'.$row->generation_id)}}">Daftar Pembayaran</a>
                                        <a class="dropdown-item " href="{{url('deleteGeneration/'.$row->generation_id)}}" onclick="if( !confirm('Yakin akan menghapus Angkatan ini ?') ){ return false; }">Delete</a>
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
        $('.tableAngkatan').DataTable( );
    </script>
@endsection    