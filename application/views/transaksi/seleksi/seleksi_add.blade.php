@extends('layouts.master')

@section('content')
    @if(!empty(get_ci()->session->flashdata('notif')))
   
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
              <div class="alert alert-success fade in">
                   <button type="button" class="close close-sm" data-dismiss="alert">
                         <i class="icon-remove"></i>
                   </button>
                    <strong>Sukses!</strong> {{ get_ci()->session->flashdata('notif') }}
               </div>
            </section>
            
        </div>
    </div>
    @endif
    @if(!empty(get_ci()->session->flashdata('notif_error')))
    <br />
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
              <div class="alert alert-danger fade in">
                   <button type="button" class="close close-sm" data-dismiss="alert">
                         <i class="icon-remove"></i>
                   </button>
                    <strong>Error!</strong> {{ get_ci()->session->flashdata('notif_error') }}
               </div>
            </section>
            
        </div>
    </div>
    @endif
    <br />
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Proses Penyeleksian Beras Miskin</header>
                <div class="panel-body">
                    <form method="post" class="form-horizontal" action="{{ site_url('seleksi/do_add') }}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Bulan</label>
                            <div class="col-sm-10">
                                <select name="bulan" class="form-control">
                                  @foreach(generate_bulan() as $key=> $item)
                                    <option value="{{ $key }}">{{ $item }}</option>

                                  @endforeach
                                </select>
                                <span class="help-block"><?php echo form_error('bulan'); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tahun</label>
                            <div class="col-sm-10">
                                <input type="text" name="tahun" class="form-control" value="{{ set_value('tahun') }}">
                                <span class="help-block"><?php echo form_error('tahun'); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-10 pull-right">
                                
                                <button class="btn btn-primary" type="submit"><i class="icon_floppy"></i> Proses</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>
@endsection
