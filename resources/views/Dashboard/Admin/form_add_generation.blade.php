@extends('layouts.admin')

@section('breadcrumb')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-auto">
                <h2>Tambah Angkatan</h2>
            </div>
        </div>
        <hr>
    </div>
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <form method="post" action="<?=url("tambah_angkatan")?>">
                @csrf
                    <div class="form-group">
                        <label>Angkatan</label>
                        <input type="text" name="generation" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="active">Aktif</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>

                    <button class="btn btn-info" type="submit">Proses</button>
                </form>    
            </div>    
        </div>     
    </div>
@endsection