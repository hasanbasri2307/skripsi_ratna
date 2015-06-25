<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ base_url('assets/report/style.css') }}" media="all" />
    <script src="{{ site_url('assets/chart/Chart.js') }}"></script>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ base_url('assets/report/logo-pemprov-dki-jakarta.png') }}">
      </div>
      <h1>Laporan Data Penerimaan Beras Periode ({{ convert_month($bulan) }} - {{ $tahun }})</h1>
      <div id="company" class="clearfix">
        <div>Kelurahan Meruya Utara</div>
        <div> Jalan Taman Aries Blok. C/6 No.1 - Kelurahan Meruya Utara
Kecamatan Kembangan, <br /> Jakarta Barat (kode pos 11620)</div>
        <div>(Telp 5858934</div>
        
      </div>
      
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th><i class="icon_calendar"></i> Nama KK</th>
            <th><i class="icon_calendar"></i> Alamat</th>
            <th><i class="icon_calendar"></i> Total Beras </th>
            <th><i class="icon_calendar"></i> Status Pembagian </th>
          </tr>
        </thead>
        <tbody>
        <?php
        
        ?>
        @if(!empty($penerimaan_beras))
        @foreach($penerimaan_beras as $key => $item)
          <tr>
            <td>{{ $key+=1 }}.</td>
            <td>{{ $item->nama_kk }} </td>
            <td>{{ $item->alamat }} </td>
            <td>{{ $item->jml_beras_warga }} Karung </td>
            <td><?php if($item->status_pembagian ==0):?> Belum Diambil <?php elseif($item->status_pembagian==1):?> Sudah Diambil <?php elseif($item->status_pembagian==2):?> Tidak Diambil. <?php endif;?> </td>
          </tr>   
        @endforeach
        @else
          <tr>
              <td colspan="5">Data Kosong</td>
          </tr>

        @endif
        
        </tbody>
      </table>
      <div style="width:75%">
        <canvas id="canvas" height="400" width="600"></canvas>
      </div>
  </body>
</html>


