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
      <h1>Laporan Data Penerimaan Beras</h1>
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
            <th class="service">No</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th class="desc">Total Warga</th>
            <th>Belum Diambil</th>
            <th>Sudah Diambil</th>
            <th>Tidak Diambil</th>
          </tr>
        </thead>
        <tbody>
        <?php
        
        ?>
        @if(!empty($penerimaan_beras))
        @foreach($penerimaan_beras as $key => $item)
          <tr>
            <td>{{ $key+=1 }}</td>
            <td>{{ convert_month($item->bulan,"full") }} </td>
            <td>{{ $item->tahun }} </td>
            <td>{{ $item->total_warga }} Warga </td>
            <td>{{ $item->belum_diambil }} Warga </td>
            <td>{{ $item->sudah_diambil }} Warga </td>
            <td>{{ $item->dibatalkan }} Warga </td>
          </tr>
          
        @endforeach
        @else
         <tr>
              <td colspan="7">Data Kosong</td>
         </tr>
        @endif

        
        </tbody>
      </table>
      <div style="width:75%">
        <canvas id="canvas" height="400" width="600"></canvas>
      </div>
  </body>
</html>


