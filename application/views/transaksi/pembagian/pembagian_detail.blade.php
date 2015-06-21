@extends("layouts.master")
@section("content")

    @if(!empty(get_ci()->session->flashdata('notif')))
    <br />
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
                <header class="panel-heading">
                    Data Hasil Seleksi Penerima Beras
                </header>

                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                       
                        <th><i class="icon_calendar"></i> Nama KK</th>
                        <th><i class="icon_calendar"></i> Alamat</th>
                        <th><i class="icon_calendar"></i> Total Beras </th>
                        <th><i class="icon_calendar"></i> Status Pembagian </th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @if(!empty($pembagian))
                        @foreach($pembagian as $key => $item)
                        <tr>
                           
                            <td>{{ $item->nama_kk }} </td>
                            <td>{{ $item->alamat }} </td>
                            <td>{{ $item->jml_beras_warga }} Karung </td>
                            <td>@if($item->status_pembagian ==0) Belum Diambil @elseif($item->status_pembagian==1) Sudah Diambil @elseif($item->status_pembagian==2) Tidak Diambil. @endif </td>
                            <td>
                                <div class="btn-group">
                                    @if($item->status_pembagian==0)<a href="{{ site_url('pembagian/ambil/'.$item->id_hasil.'/'.$bulan.'/'.$tahun) }}" onclick="return confirm('Memproses Data Pengambilan Ini ?');">Ambil</a> || <a href="{{ site_url('pembagian/batal/'.$item->id_hasil.'/'.$bulan.'/'.$tahun) }}" onclick="return confirm('Memproses Data Pembatalan Pengambilan Ini ?');">Tidak Diambil</a> @else - @endif
                                    
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                       <tr>
                            <td colspan="4">Data Kosong</td>
                        </tr>
                    @endif    
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="text-center">
                  <?php echo $links; ?>
                </div>
            </section>
        </div>
    </div>
@endsection