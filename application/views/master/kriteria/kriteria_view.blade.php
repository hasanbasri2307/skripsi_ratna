@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <section class="panel box">
              <div class="panel-body">
              
               @if(!empty($notif))
                        <div class="alert alert-success fade in">
                                  <button type="button" class="close close-sm" data-dismiss="alert">
                                      <i class="icon-remove"></i>
                                  </button>
                                  <strong>Sukses !! </strong> {{ $notif }}
                              </div>
                @endif

                <div class="page-header">
                    
                     <p>
                        <h4><em class="pull-left">Nama Kriteria:&nbsp;&nbsp;</em></h4>
                         {{ $kriteria->nama }}
                    </p>
                    <p>
                        <h4><em class="pull-left">Score:&nbsp;&nbsp;</em></h4>
                         {{ $kriteria->score }}
                    </p>
                 
                   
                </div>
                    <div class="pull-right">
                        <a href="{{ site_url('kriteria') }}" class="btn btn-danger"><i class="arrow_back"></i> Kembali</a>
                        <a href="{{ site_url('kriteria/edit/'.$kriteria->id_kriteria) }}" class="btn btn-success"><i class="icon_pencil-edit"></i> Edit</a>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
