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
                        <h4><em class="pull-left">No KK:&nbsp;&nbsp;</em></h4>
                         {{ $transaksi->no_kk }}
                    </p>
                    <p>
                        <h4><em class="pull-left">Nama KK:&nbsp;&nbsp;</em></h4>
                         {{ $transaksi->nama_kk }}
                    </p>
                    <p>
                        <h4><em class="pull-left">NIK KK:&nbsp;&nbsp;</em></h4>
                         {{ $transaksi->nik_kk }}
                    </p>
                    <p>
                        <h4><em class="pull-left">Alamat:&nbsp;&nbsp;</em></h4>
                         {{ $transaksi->alamat }}
                    </p>
                    <p>
                        <h4><em class="pull-left">Keterangan:&nbsp;&nbsp;</em></h4>
                         @if(!empty($transaksi->keterangan)) {{ $transaksi->keterangan }} @else - @endif
                    </p>
                    <p>
                        <h4><em class="pull-left">Status Berkas:&nbsp;&nbsp;</em></h4>
                         @if($transaksi->status ==1) Berkas Lengkap @elseif($transaksi->status ==2) Berkas Belum Terverifikasi @elseif($transaksi->status==0) Berkas Belum Lengkap @endif
                    </p>
                    <br />
                    <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Nama Kriteria</th>
                                  <th>Keterangan</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <?php $no=1;?>
                              @if(!empty($detail))
                                  @foreach($detail as $item)
                                      <tr>
                                          <td>{{ $no }}.</td>
                                          <td>{{ $item->nama }}</td>
                                          <td>Ya</td>
                                        
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
                    <div class="pull-right">
                        <a href="{{ site_url('transaksi') }}" class="btn btn-danger"><i class="arrow_back"></i> Kembali</a>
                        <a href="{{ site_url('transaksi/edit/'.$transaksi->id_warga) }}" class="btn btn-success"><i class="icon_pencil-edit"></i> Edit</a>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
