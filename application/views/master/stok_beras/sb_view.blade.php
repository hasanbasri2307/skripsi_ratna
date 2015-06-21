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
                        <h4><em class="pull-left">Bulan:&nbsp;&nbsp;</em></h4>
                         {{ convert_month($stok_beras->bulan) }}
                    </p>
                    <p>
                        <h4><em class="pull-left">Tahun:&nbsp;&nbsp;</em></h4>
                         {{ $stok_beras->tahun }}
                    </p>
                    <p>
                        <h4><em class="pull-left">Jumlah Stok:&nbsp;&nbsp;</em></h4>
                         {{ number_format($stok_beras->jml_stock - $stok_beras->tambahan_stock) }} karung
                    </p>
                    <p>
                        <h4><em class="pull-left">Tambahan Stock:&nbsp;&nbsp;</em></h4>
                         {{ number_format($stok_beras->tambahan_stock) }} karung
                    </p>
                    <p>
                        <h4><em class="pull-left">Jumlah Stok Keseluruhan:&nbsp;&nbsp;</em></h4>
                         {{ number_format($stok_beras->jml_stock) }} karung
                    </p>
                    <p>
                        <h4><em class="pull-left">Jumlah Stok Terpakai:&nbsp;&nbsp;</em></h4>
                         {{ number_format($stok_beras->stock_terpakai) }} karung
                    </p>
                   
                </div>
                    <div class="pull-right">
                        <a href="{{ site_url('stok_beras') }}" class="btn btn-danger"><i class="arrow_back"></i> Kembali</a>
                        <a href="{{ site_url('stok_beras/edit/'.$stok_beras->id_stok_beras) }}" class="btn btn-success"><i class="icon_pencil-edit"></i> Edit</a>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
