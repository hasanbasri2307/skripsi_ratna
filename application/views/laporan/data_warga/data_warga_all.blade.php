<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ base_url('assets/report/style.css') }}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ base_url('assets/report/logo-pemprov-dki-jakarta.png') }}">
      </div>
      <h1>Laporan Data Warga</h1>
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
            <th class="desc">No KK</th>
            <th>Nama KK</th>
            <th>NIK KK</th>
            <th>RW</th>
          </tr>
        </thead>
        <tbody>
        @if(!empty($warga))
        @foreach($warga as $key => $item)
          <tr>
            <td class="service">{{ $key +=1 }}.</td>
            <td class="desc">{{ $item->no_kk }}</td>
            <td class="unit">{{ $item->nama_kk }}</td>
            <td class="qty">{{ $item-> nik_kk }}</td>
            <td class="total">{{ $item->rw }}</td>
          </tr>
        @endforeach
        @else
         <tr>
            <td colspan="5">Data Kosong</td>
          </tr>
        @endif
        </tbody>
      </table>
      
  </body>
</html>