@extends("layouts.master")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <a href="{{ site_url('seleksi/add') }}" class="btn btn-success btn-sm pull-left" id="add-regular"><i class="icon_plus_alt2"></i> Tambah Penerima Beras</a>

            </section>

        </div>
    </div>
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
                    Hasil Seleksi Penerimaan Beras
                </header>

                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th><i class="icon_profile"></i> No </th>
                        <th><i class="icon_calendar"></i> Bulan</th>
                        <th><i class="icon_calendar"></i> Tahun</th>
                        <th><i class="icon_calendar"></i> Total Penerima</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @if(!empty($seleksi))
                        @foreach($seleksi as $key => $item)
                        <tr>
                            <td>{{ $key+=1 }}. </td>
                            <td>{{ convert_month($item->bulan,"full") }} </td>
                            <td>{{ $item->tahun }} </td>
                            <td>{{ $item->total_warga }} </td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ site_url('seleksi/view/'.$item->id_hasil) }}"><i class="icon_plus_alt2"></i></a>
                                    <a class="btn btn-success" href="{{ site_url('seleksi/edit/'.$item->id_hasil) }}"><i class="icon_check_alt2"></i></a>
                                    <a class="btn btn-danger" href="{{ site_url('seleksi/delete/'.$item->id_hasil) }}" onclick="return confirm('Hapus seleksi ini ?');"><i class="icon_close_alt2"></i></a>
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