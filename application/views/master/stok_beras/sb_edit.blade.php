@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Edit Stok Beras</header>
                <div class="panel-body">
                    <form method="post" class="form-horizontal" action="{{ current_url() }}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Bulan</label>
                            <div class="col-sm-10">
                                <select class="form-control m-bot15" name="bulan">
                                        @foreach(generate_bulan() as $key => $item)
                                          <option value="{{ $key }}" @if($stok_beras->bulan == $key) selected='selected' @endif>{{ $item }}</option>
                                         @endforeach
                                </select>
                                <span class="help-block"><?php echo form_error('bulan'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tahun</label>
                            <div class="col-sm-10">
                                <select class="form-control m-bot15" name="tahun">
                                       @for($i=2015;$i <=2020; $i++)
                                         <option value="{{ $i }}" @if($stok_beras->tahun == $i) selected='selected' @endif >{{ $i }}</option>
                                        @endfor
                                </select>
                                <span class="help-block"><?php echo form_error('tahun'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jumlah Stok</label>
                            <div class="col-sm-10">
                                <input type="text" name="jml_stok" class="form-control" value="{{ $stok_beras->jml_stock }}">
                                <span class="help-block"><?php echo form_error('jml_stok'); ?></span>
                            </div>
                        </div>
                
                        <div class="form-group">
                            <div class="col-sm-10 pull-right">
                                <a class="btn  btn-danger" href="{{ site_url('stok_beras') }}"><i class="arrow_back"></i> Batal</a>
                                <button class="btn btn-primary" type="submit"><i class="icon_floppy"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
