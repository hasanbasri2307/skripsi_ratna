@extends("layouts.master")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <a href="{{ site_url('user/add') }}" class="btn btn-success btn-sm pull-left" id="add-regular"><i class="icon_plus_alt2"></i> Tambah pengguna</a>

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
                        <th><i class="icon_profile"></i> Username</th>
                        <th><i class="icon_calendar"></i> Level</th>
                        <th><i class="icon_calendar"></i> Status</th>
                        <th><i class="icon_cogs"></i> Action</th>
                    </tr>
                    @if(!empty($users))
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->level }}</td>
                            <td>@if($user->status ==1) Aktif @else Non Aktif @endif</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ site_url('user/view/'.$user->id_user) }}"><i class="icon_search"></i></a>
                                    <a class="btn btn-success" href="{{ site_url('user/edit/'.$user->id_user) }}"><i class="icon_check_alt2"></i></a>
                                    <a class="btn btn-danger" href="{{ site_url('user/delete/'.$user->id_user) }}" onclick="return confirm('Hapus User ini ?');"><i class="icon_close_alt2"></i></a>
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