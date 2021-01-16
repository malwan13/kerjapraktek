@extends('layouts.admin')

@section('breadcrumb')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-auto">
                <h2>Daftar Pembayaran</h2>
            </div>
        </div>
        <hr>
    </div>
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
            <table class="tablePembayaran table table-responsive-sm table-bordered" cellspacing="0" width="100%">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>NIM</th>
                        <th>Semester</th>
                        <th>Bukti Bayar</th>
                        <th>Total Bayar</th>
                        <th>Sisa Bayar</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                    </tr>
                    </thead>
                    <tbody class="table-hover">
                        @foreach ($bukti as $row)
                            <tr>
                                <td>{{$row->id_bukti_pembayaran}}</td>
                                <td>{{$row->user_id}}</td>
                                <td>{{$row->semester}}</td>
                                <td><img src="{{url($row->bukti_bayar)}}" alt="" width="150" height="auto"></td>
                                <td>{{$row->total_bayar}}</td>
                                <td>{{$row->sisa_bayar}}</td>
                                <td>{{$row->tanggal}}</td>
                                <td>{{$row->keterangan}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
       </div>     
    </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-auto">
                <h2>Daftar Pembayaran Tunggakan</h2>
            </div>
        </div>
        <hr>
    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
            <table class="tablePembayaran table table-responsive-sm table-bordered" cellspacing="0" width="100%">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>NIM</th>
                        <th>Semester</th>
                        <th>Bukti Bayar</th>
                        <th>Total Bayar</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                    </tr>
                    </thead>
                    <tbody class="table-hover">
                        @foreach ($bukti_tunggak as $row)
                            <tr>
                                <td>{{$row->id_bukti_pembayaran}}</td>
                                <td>{{$row->user_id}}</td>
                                <td>{{$row->semester}}</td>
                                <td><img src="{{url($row->bukti_bayar)}}" alt="" width="150" height="auto"></td>
                                <td>{{$row->total_bayar}}</td>
                                <td>{{$row->tanggal}}</td>
                                <td>{{$row->keterangan}}</td>
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
        $('.tablePembayaran').DataTable( );
    </script>
@endsection    