@extends("layouts.master")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <a href="{{ site_url('stok_beras/add') }}" class="btn btn-success btn-sm pull-left" id="add-regular"><i class="icon_plus_alt2"></i> Tambah Stok Beras</a>

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
                    Users
                </header>

                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th><i class="icon_profile"></i> Bulan </th>
                        <th><i class="icon_calendar"></i> Tahun</th>
                        <th><i class="icon_calendar"></i> Jml Stok</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @foreach($sb as $item)
                    <tr>
                        <td>{{ convert_month($item->bulan) }}</td>
                        <td>{{ $item->tahun }}</td>
                        <td>{{ $item->jml_stock }} Karung</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{ site_url('stok_beras/view/'.$item->id_stok_beras) }}"><i class="icon_plus_alt2"></i></a>
                                <a class="btn btn-success" href="{{ site_url('stok_beras/edit/'.$item->id_stok_beras) }}"><i class="icon_check_alt2"></i></a>
                                <a class="btn btn-danger" href="{{ site_url('stok_beras/delete/'.$item->id_stok_beras) }}" onclick="return confirm('Hapus Stok Beras ini ?');"><i class="icon_close_alt2"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </section>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="text-center">
                  <?php echo $links; ?>
                </div>
            </section>
        </div>
    </div> -->
@endsection