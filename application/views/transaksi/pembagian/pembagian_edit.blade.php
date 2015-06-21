@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Edit Penerima Beras Miskin</header>
                <div class="panel-body">
                    <form method="post" class="form-horizontal" action="{{ current_url() }}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">No. KK</label>
                            <div class="col-sm-10">
                                <input type="text" name="no_kk" class="form-control" value="{{ $transaksi->no_kk }}">
                                <span class="help-block"><?php echo form_error('no_kk'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Kepala Keluarga</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_kk" class="form-control" value="{{ $transaksi->nama_kk }}">
                                <span class="help-block"><?php echo form_error('nama_kk'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nik. KK</label>
                            <div class="col-sm-10">
                                <input type="text" name="nik_kk" class="form-control" value="{{ $transaksi->nik_kk }}">
                                <span class="help-block"><?php echo form_error('nik_kk'); ?></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea name="alamat_kk" class="form-control">{{ $transaksi->alamat }}</textarea>
                                <span class="help-block"><?php echo form_error('alamat_kk'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kriteria</label>
                            <div class="col-sm-10">
                                <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Nama Kriteria</th>
                                  <th>Pilihan</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <?php $no=1;?>
                              @if(!empty($kriteria))
                                  @foreach($kriteria as $item)
                                      <tr>
                                          <td>{{ $no }}.</td>
                                          <td>{{ $item->nama }}</td>
                                          <td><input type="checkbox" name="kriteria[]" value="{{ $item->score }}_{{ $item->id_kriteria }}" <?php if(cekDetail($item->id_kriteria,$transaksi->id_warga) > 0) { echo "checked='checked'";} ?>></td>
                                        
                                      </tr>
                                  <?php $no++;?>
                                  @endforeach
                               @else
                                  <tr>
                                      <td colspan="4">Data Kosong</td>
                                  </tr>
                                @endif
                              </tbody>
                          </table>
                            </div>
                        </div>
                        @if(getLevel() != "rt")
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea name="alamat_kk" class="form-control">{{ $transaksi->keterangan }}</textarea>
                                <span class="help-block"><?php echo form_error('keterangan'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control">
                                  <option value="1" @if($transaksi->status==1) checked="checked" @endif>Data Lengkap</option>
                                  <option value="0" @if($transaksi->status==0) checked="checked" @endif>Data Belum Lengkap</option>
                                </select>
                                <span class="help-block"><?php echo form_error('status'); ?></span>
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <div class="col-sm-10 pull-right">
                                <a class="btn  btn-danger" href="{{ site_url('transaksi') }}"><i class="arrow_back"></i> Batal</a>
                                <button class="btn btn-primary" type="submit"><i class="icon_floppy"></i> Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>
@endsection
