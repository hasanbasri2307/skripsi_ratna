<?php

function blade()
{
    $blade = new duncan3dc\Laravel\BladeInstance(APPPATH . 'views', APPPATH . 'cache');
    return $blade;
}

function get_ci()
{
    $ci = &get_instance();
    return $ci;
}

function pagination($total_rows)
{
    $CI =& get_instance();

    $CI->pagination->total_rows = $total_rows;
    $CI->pagination->uri_segment = $total_segments = $CI->uri->total_segments();

    $segs = $CI->uri->segment_array();
    if (count($segs) == 1) {
        $CI->pagination->base_url = current_url();
    } else {
        foreach ($segs as $value) {
            $url[] = $value;
        }
        array_pop($url);
        $CI->pagination->base_url = site_url(implode('/', $url));
    }

    return $CI->pagination->create_links();
}

function generate_bulan()
{
    $bulan = [
        '1' => 'Januari',
        '2' => 'Februari',
        '3' => 'Maret',
        '4' => 'April',
        '5' => 'Mei',
        '6' => 'Juni',
        '7' => 'Juli',
        '8' => 'Agustus',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    ];

    return $bulan;
}

function generate_level()
{
    $level = [
        'admin' => 'admin',
        'staff_kelurahan' => 'staff_kelurahan',
        'rt' => 'rt',
    ];

    return $level;
}

function convert_month($month,$type='full')
{
    $result="";
    switch ($month) {
        case '1':
            if($type=='full')
            {
                $result="Januari";
            }
            elseif($type=='short')
            {
                $result="Jan";
            }
            break;
        case '2':
            if($type=='full')
            {
                $result="Februari";
            }
            elseif($type=='short')
            {
                $result="Feb";
            }
            break;
        case '3':
            if($type=='full')
            {
                $result="Maret";
            }
            elseif($type=='short')
            {
                $result="Mar";
            }
            break;
        case '4':
            if($type=='full')
            {
                $result="April";
            }
            elseif($type=='short')
            {
                $result="Apr";
            }
            break;
        case '5':
            if($type=='full')
            {
                $result="Mei";
            }
            elseif($type=='short')
            {
                $result="Mei";
            };
            break;
        case '6':
            if($type=='full')
            {
                $result="Juni";
            }
            elseif($type=='short')
            {
                $result="Jun";
            }
            break;
        case '7':
            if($type=='full')
            {
                $result="Juli";
            }
            elseif($type=='short')
            {
                $result="Jul";
            }
            break;
        case '8':
            if($type=='full')
            {
                $result="Agustus";
            }
            elseif($type=='short')
            {
                $result="Agst";
            }
            break;
        case '9':
            if($type=='full')
            {
                $result="September";
            }
            elseif($type=='short')
            {
                $result="Sep";
            }
            break;
        case '10':
            if($type=='full')
            {
                $result="Oktober";
            }
            elseif($type=='short')
            {
                $result="Okt";
            }
            break;
        case '11':
            if($type=='full')
            {
                $result="November";
            }
            elseif($type=='short')
            {
                $result="Nov";
            }
            break;
        case '12':
            if($type=='full')
            {
                $result="Desember";
            }
            elseif($type=='short')
            {
                $result="Des";
            }
            break;

    }

    return $result;
}

function convert_date($data,$days_name=1,$time=1,$type="full")
{
    $explode = explode(" ",$data);
    $dates = $explode[0];
    $times = $explode[1];

    $explode_dates = explode('-', $dates);
    $date = $explode_dates[2];

    $month = convert_month($explode_dates[1],$type);

    $year = $explode_dates[0];
    $days_name = convert_days($dates);
    if($days_name ==1 )
    {
        return $days_name.', '.$date.' '.$month.' '.$year;
    }
    else if($time==1)
    {
        return $date.' '.$month.' '.$year.'  '.$times;
    }
    else if($days_name ==1 && $time==1)
    {
        return $days_name.', '.$date.' '.$month.' '.$year.' '.$times;
    }
    else
    {
        return $date.' '.$month.' '.$year;
    }
}


function convert_days($date)
{
    $result="";
    $convert = date("l",strtotime($date));

    switch ($convert) {
        case 'Sunday':
            $result="Minggu";
            break;
        case 'Monday':
            $result="Senin";
            break;
        case 'Tuesday':
            $result="Selasa";
            break;
        case 'Wednesday':
            $result="Rabu";
            break;
        case 'Thursday':
            $result="Kamis";
            break;
        case 'Friday':
            $result="Jumat";
            break;
        case 'Saturday':
            $result="Sabtu";
            break;
    }

    return $result;
}