@extends('layouts.main')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-6">
                @if (session('msg'))
                    <div class="alert alert-danger">
                        {{ session('msg') }}
                    </div>
                @endif
                <form method="post" action="<?=url("register/execute")?>">
                    @csrf
                    <div class="card pt-3">
                        <div class="text-center">
                            <h3>Register</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>NIM</label>
                                <input required name="nim" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input required name="name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input required name="email" type="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Program Studi</label>
                                <input required name="program" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Angkatan</label>
                                <select name="generation" class="form-control" id="" required>
                                    @foreach($generation as $row)
                                        <option value="{{$row->generation_id}}">{{$row->generation}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="address" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nomor Handphone</label>
                                <input required name="no_handphone" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input required name="password" type="password" class="form-control">
                            </div>

                            <button class="btn btn-info" type="submit">Register</button>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
@endsection