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
      <h1>Laporan Data Stok Beras</h1>
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
            <th class="desc">Jumlah Stok</th>
            <th>Stok Tambahan</th>
            <th>Stok Terpakai</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $bulan = [];
        ?>
        @if(!empty($stok_beras))
        @foreach($stok_beras as $key => $item)
          <tr>
            <td class="service">{{ $key +=1 }}.</td>
            <td class="service">{{ convert_month($item->bulan) }}</td>
            <td class="service">{{ $item->tahun }} </td>
            <td class="desc">{{ $item->jml_stock - $item->tambahan_stock  }} Karung</td>
            <td class="unit">{{ $item->tambahan_stock }} Karung</td>
            <td class="qty">{{ $item-> stock_terpakai }} Karung</td>
          </tr>
          <?php $bulan[] = convert_month($item->bulan);?>
          <?php $jml_stok[] = $item->jml_stock - $item->tambahan_stock;?>
          <?php $jml_tambahan[] = $item->tambahan_stock;?>
          <?php $terpakai[] = $item->stock_terpakai;?>
        @endforeach
        @else
        <tr>
            <td colspan="6">Data Kosong</td>
      </tr>
      @endif
        </tbody>
      </table>
      <div style="width:75%">
        <canvas id="canvas" height="400" width="600"></canvas>
      </div>
  </body>
</html>
<script>
    
    var lineChartData = {
      labels : <?php echo json_encode($bulan) ;?>,
      datasets : [
        {
          label: "My First dataset",
          fillColor : "rgba(220,220,220,0.2)",
          strokeColor : "rgba(220,220,220,1)",
          pointColor : "rgba(220,220,220,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(220,220,220,1)",
          data : <?php echo json_encode($jml_stok);?>
        },
        {
          label: "My Second dataset",
          fillColor : "rgba(151,187,205,0.2)",
          strokeColor : "rgba(151,187,205,1)",
          pointColor : "rgba(151,187,205,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(151,187,205,1)",
          data : <?php echo json_encode($jml_tambahan);?>
        },
        {
          label: "My Second dataset",
          fillColor : "rgba(141,150,210,0.2)",
          strokeColor : "rgba(151,187,205,1)",
          pointColor : "rgba(151,187,205,1)",
          pointStrokeColor : "#fff",
          pointHighlightFill : "#fff",
          pointHighlightStroke : "rgba(151,187,205,1)",
          data : <?php echo json_encode($terpakai);?>
        }
      ]

    }

  window.onload = function(){
    var ctx = document.getElementById("canvas").getContext("2d");
    window.myLine = new Chart(ctx).Line(lineChartData, {
      responsive: true
    });
  }


  </script>

