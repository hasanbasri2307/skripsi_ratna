@extends("layouts.master")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <a href="{{ site_url('kriteria/add') }}" class="btn btn-success btn-sm pull-left" id="add-regular"><i class="icon_plus_alt2"></i> Tambah Kriteria</a>

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
                    Kriteria
                </header>

                <table class="table table-striped table-advance table-hover">
                    <tbody>
                    <tr>
                        <th><i class="icon_profile"></i> Nama </th>
                        <th><i class="icon_calendar"></i> Score</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @if(!empty($kriteria))
                        @foreach($kriteria as $item)
                        <tr>
                       
                            <td>{{ word_limiter($item->nama,10) }} </td>
                            <td>{{ $item->score }} </td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ site_url('kriteria/view/'.$item->id_kriteria) }}"><i class="icon_search"></i></a>
                                    <a class="btn btn-success" href="{{ site_url('kriteria/edit/'.$item->id_kriteria) }}"><i class="icon_check_alt2"></i></a>
                                    <a class="btn btn-danger" href="{{ site_url('kriteria/delete/'.$item->id_kriteria) }}" onclick="return confirm('Hapus Kriteria ini ?');"><i class="icon_close_alt2"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                       <tr>
                            <td colspan="3">Data Kosong</td>
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