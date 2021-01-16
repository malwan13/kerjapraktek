@extends('layouts.admin')

@section('breadcrumb')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-auto">
                <h2>Edit Angkatan</h2>
            </div>
        </div>
        <hr>
    </div>
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <form method="post" action="<?=url("edit_angkatan/{$generation->generation_id}")?>">
                @csrf
                    <div class="form-group">
                        <label>Angkatan</label>
                        <input type="text" name="generation" class="form-control" value="{{$generation->generation}}">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="active" <?php echo ($generation->status == 'active' ? "selected" : ""); ?> >Aktif</option>
                            <option value="draft" <?php echo ($generation->status == 'draft' ? "selected" : ""); ?> >Draft</option>
                        </select>
                    </div>

                    <button class="btn btn-info" type="submit">Proses</button>
                </form>    
            </div>    
        </div>     
    </div>
@endsection