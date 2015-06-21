@extends('layouts.master')

@section('content')
    
    <section class="panel">
                          <header class="panel-heading tab-bg-primary ">
                              <ul class="nav nav-tabs">
                                  <li class="active">
                                      <a href="#home" data-toggle="tab">Semua</a>
                                  </li>
                                  <li class="">
                                      <a href="#about" data-toggle="tab">Per Periode</a>
                                  </li>
                                  
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div class="tab-pane active" id="home">
                                     <div class="panel-body">
                                        <form method="post" class="form-horizontal" action="{{ site_url('report/penerimaan_beras_all') }}">
                                            <div class="form-group">
                                                <div class="col-sm-10 pull-left">
                                                    
                                                    <button class="btn btn-primary" type="submit"><i class="icon_printer"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                  </div>
                                  <div class="tab-pane" id="about">
                                      <div class="panel-body">
                                          <form method="post" class="form-horizontal" action="{{ site_url('report/penerimaan_beras_periode') }}">
                                             
                                              <div class="form-group">
                                                  <label class="col-sm-2 control-label">Bulan</label>
                                                  <div class="col-sm-10">
                                                      <select name="bulan" class="form-control">
                                                        @foreach(generate_bulan() as $key => $item)
                                                          <option value="{{ $key }}">{{ $item }}</option>
                                                        @endforeach
                                                      </select>
                                                      <span class="help-block"><?php echo form_error('buan'); ?></span>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-sm-2 control-label">Tahun</label>
                                                  <div class="col-sm-10">
                                                      <input type="text" class="form-control" name="tahun" requrid>
                                                      <span class="help-block"><?php echo form_error('tahun'); ?></span>
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group">
                                                  <div class="col-sm-10 pull-right">
                                                      
                                                      <button class="btn btn-primary" type="submit"><i class="icon_printer"></i> Cetak</button>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                                  
                              </div>
                          </div>
                      </section>
    
@endsection
