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
                      
                        <th><i class="icon_calendar"></i> Bulan</th>
                        <th><i class="icon_calendar"></i> Tahun</th>
                        <th><i class="icon_calendar"></i> Total Warga </th>
                        <th><i class="icon_calendar"></i> Yang Belum Diambil</th>
                        <th><i class="icon_calendar"></i> Yang Sudah Diambil </th>
                        <th><i class="icon_calendar"></i> Yang Tidak Diambil </th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @if(!empty($pembagian))
                        @foreach($pembagian as $key => $item)
                        <tr>
                          
                            <td>{{ convert_month($item->bulan,"full") }} </td>
                            <td>{{ $item->tahun }} </td>
                            <td>{{ $item->total_warga }} Warga </td>
                            <td>{{ $item->belum_diambil }} Warga </td>
                            <td>{{ $item->sudah_diambil }} Warga </td>
                            <td>{{ $item->dibatalkan }} Warga </td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ site_url('pembagian/view/'.$item->bulan.'/'.$item->tahun) }}"><i class="icon_search"></i></a>
                                    
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