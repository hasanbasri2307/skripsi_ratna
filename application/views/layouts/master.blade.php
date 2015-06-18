<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Karmanta - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Karmanta, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>{{ $title }}</title>

    <!-- Bootstrap CSS -->
    <link href="{{ base_url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{ base_url('assets/css/bootstrap-theme.css') }}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{ base_url('assets/css/elegant-icons-style.css') }}" rel="stylesheet" />
    <link href="{{ base_url('assets/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="{{ base_url('assets/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') }}" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="{{ base_url('assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ base_url('assets/css/owl.carousel.css') }}" type="text/css">

    <!-- Custom styles -->
    <link href="{{ base_url('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ base_url('assets/css/style-responsive.css') }}" rel="stylesheet" />
    @yield("css_script")

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="{{ base_url('assets/js/html5shiv.js') }}"></script>
    <script src="{{ base_url('assets/js/respond.min.js') }}"></script>
    <script src="{{ base_url('assets/js/lte-ie7.js') }}"></script>
    <![endif]-->
</head>

<body>
<!-- container section start -->
<section id="container" class="">

    @include("partials.header")
    <!--header end-->

    <!--sidebar start-->
    @include("partials.sidebar")
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            @yield("content")
        </section>
    </section>
    <!--main content end-->
</section>
<!-- container section start -->

<!-- javascripts -->
<script src="{{ base_url('assets/js/jquery.js') }}"></script>
<script src="{{ base_url('assets/js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript" src="{{ base_url('assets/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
<!-- bootstrap -->
<script src="{{ base_url('assets/js/bootstrap.min.js') }}"></script>
<!-- nice scroll -->
<script src="{{ base_url('assets/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ base_url('assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
<!-- charts scripts -->
<script src="{{ base_url('assets/assets/jquery-knob/js/jquery.knob.js') }}"></script>
<script src="{{ base_url('assets/js/jquery.sparkline.js') }}" type="text/javascript"></script>
<script src="{{ base_url('assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
<script src="{{ base_url('assets/js/owl.carousel.js') }}" ></script>
<!-- jQuery full calendar -->
<script src="{{ base_url('assets/assets/fullcalendar/fullcalendar/fullcalendar.min.js') }}"></script>
<!--script for this page only-->
<script src="{{ base_url('assets/js/calendar-custom.js') }}"></script>
<!-- custom select -->
<script src="{{ base_url('assets/js/jquery.customSelect.min.js') }}" ></script>
<!--custome script for all page-->
<script src="{{ base_url('assets/js/scripts.js') }}"></script>
<!-- custom script for this page-->
<script src="{{ base_url('assets/js/sparkline-chart.js') }}"></script>
<script src="{{ base_url('assets/js/easy-pie-chart.js') }}"></script>
@yield("js_script")
<script>

    //knob
    $(function() {
        $(".knob").knob({
            'draw' : function () {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function() {
        $("#owl-slider").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>

</body>
</html>
