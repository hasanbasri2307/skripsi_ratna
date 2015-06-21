@extends("layouts.master")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <a href="{{ site_url('transaksi/add') }}" class="btn btn-success btn-sm pull-left" id="add-regular"><i class="icon_plus_alt2"></i> Tambah Penerima Beras</a>

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
                    Data Warga Miskin Penerima Beras 
                </header>

                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th><i class="icon_profile"></i> Nama KK </th>
                        <th><i class="icon_calendar"></i> No KK</th>
                        <th><i class="icon_calendar"></i> NIK KK</th>
                        <th><i class="icon_calendar"></i> RW</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @if(!empty($transaksi))
                        @foreach($transaksi as $item)
                        <tr>
                       
                            <td>{{ $item->nama_kk }} </td>
                            <td>{{ $item->no_kk }} </td>
                            <td>{{ $item->nik_kk }} </td>
                            <td>{{ $item->rw }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ site_url('transaksi/view/'.$item->id_warga) }}"><i class="icon_search"></i></a>
                                    <a class="btn btn-success" href="{{ site_url('transaksi/edit/'.$item->id_warga) }}"><i class="icon_check_alt2"></i></a>
                                    <a class="btn btn-danger" href="{{ site_url('transaksi/delete/'.$item->id_warga) }}" onclick="return confirm('Hapus transaksi ini ?');"><i class="icon_close_alt2"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                       <tr>
                            <td colspan="5">Data Kosong</td>
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