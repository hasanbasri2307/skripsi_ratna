<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="<?php echo (get_ci()->router->fetch_class() == 'dashboard') ? ' active': '' ?>">
                <a class="" href="{{ site_url("dashboard") }}">
                    <i class="icon_house_alt"></i>
                    <span>Beranda</span>
                </a>
            </li>
            <li class="sub-menu <?php if(get_ci()->router->fetch_class() == 'user' || get_ci()->router->fetch_class() =='stok_beras' || get_ci()->router->fetch_class() == 'data_warta') { echo 'active';} ?>">
                <a href="javascript:;" class="">
                    <i class="icon_desktop"></i>
                    <span>Master Data</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ site_url('user') }}">User</a></li>
                    <li><a class="" href="{{ site_url('stok_beras') }}">Data Stok Beras</a></li>
                    <li><a class="" href="grids.html">Data Warga</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Transaksi</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="form_component.html">Input Penerima Beras</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_piechart"></i>
                    <span>Laporan</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="chart-chartjs.html">Laporan Hasil Seleksi</a></li>
                    <li><a class="" href="chart-chartjs.html">Laporan Stok Beras</a></li>
                    <li><a class="" href="chart-chartjs.html">Laporan Data Warga</a></li>
                </ul>
            </li>
            
            
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>