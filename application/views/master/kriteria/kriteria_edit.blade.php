@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Edit Kriteria</header>
                <div class="panel-body">
                    <form method="post" class="form-horizontal" action="{{ current_url() }}">
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Kriteria</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control" value="{{ $kriteria->nama }}">
                                <span class="help-block"><?php echo form_error('nama'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Score</label>
                            <div class="col-sm-10">
                                <input type="text" name="score" class="form-control" value="{{ $kriteria->score }}">
                                <span class="help-block"><?php echo form_error('score'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 pull-right">
                                <a class="btn  btn-danger" href="{{ site_url('kriteria') }}"><i class="arrow_back"></i> Batal</a>
                                <button class="btn btn-primary" type="submit"><i class="icon_floppy"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
