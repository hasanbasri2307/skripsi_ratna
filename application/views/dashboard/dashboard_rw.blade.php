@extends("layouts.master")
@section("content")
    
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Data Warga Yang Belum Lengkap
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
                    @if(!empty($warga))
                        @foreach($warga as $item)
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
    
@endsection