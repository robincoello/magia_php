<?php

function magia_dates_cal_age($birthday) {


    $cumpleanos = new DateTime($birthday);
    $hoy = new DateTime();
    $annos = $hoy->diff($cumpleanos);
    return $annos->y;
}

/**
 * Entrega la lista de dias feriados 
 * @param type $year
 * @return array
 */
function magia_dates_holidays_belgium($year = null) {

    $dates = array();

    foreach (holidays_list() as $key => $value) {
        array_push($dates, $value['date']);
    }

    return $dates;
}

function magia_dates_formated($date, $format = "") {

    if (!$date) {
        return null;
    }
    $date = substr($date, 0, 10);
    $new_date = date('d M Y', strtotime($date . "+0 day"));

    return $new_date;
}

function magia_dates_add_day($date, $day) {
    /**
     * 
      $stop_date = '2009-09-30 20:24:00';
      echo 'date before day adding: ' . $stop_date;
      $stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' +1 day'));
      echo 'date after adding 1 day: ' . $stop_date;
     */
    $new_date = date('Y-m-d H:i:s', strtotime($date . "+$day day"));
    return $new_date;
}

function magia_dates_add_month($date, $month) {
    /**
     * 
      $stop_date = '2009-09-30 20:24:00';
      echo 'date before day adding: ' . $stop_date;
      $stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' +1 day'));
      echo 'date after adding 1 day: ' . $stop_date;
     */
    $new_date = date('Y-m-d H:i:s', strtotime($date . "+$month month"));
    return $new_date;
}

function magia_dates_remove_day($date, $day) {
    /**
     * 
      $stop_date = '2009-09-30 20:24:00';
      echo 'date before day adding: ' . $stop_date;
      $stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' +1 day'));
      echo 'date after adding 1 day: ' . $stop_date;
     */
    $new_date = date('Y-m-d H:i:s', strtotime($date . "-$day day"));
    return $new_date;
}

function magia_dates_remove_month($date, $month) {
    $new_date = date('Y-m-d H:i:s', strtotime($date . "-$month month"));
    return $new_date;
}

/**
 * A una fecha le sumo $nDays dias sin incluir dias feriados, sabados ni domingos 
 * 
 * @param type $date
 * @param type $nDays
 * @return type
 */
function magia_add_only_n_working_days($date, $nDays) {

    $new_date = $date;
    $cpt = 0;
    $i = 1;

    while ($cpt < $nDays) {

        if (
                date('w', strtotime($date . "+$i day")) != 0 &&
                date('w', strtotime($date . "+$i day")) != 6 &&
                !in_array(date('Y-m-d', strtotime($date . "+$i day")), magia_dates_holidays_belgium(date('Y')))
        ) {
            $new_date = date('Y-m-d H:i:s', strtotime($date . "+$i day"));
            $cpt++;
        }

        $i++;
    }

    return $new_date;

//    // Ejemplo: a jueves agregar dias
//    // j + 4 = v s d l        Aca se suma s y d ERROR
//    // j + 4 = v x x l m m    Aca se salta s y d OKKKKKK
//    // start debe ser inferior o igual a end
//    // start y end debe ser de formato correcto 
//    // Saco los n dias entre las dos fechas     
//    $new_date = magia_dates_add_day($date, $nDays);
//
//    $i=0; 
//    while ($i <= $nDays) {
//        
//        $day = date('D', strtotime($date)); 
//        $Y = date('Y', strtotime($date)); 
//        
//        if( ($day != "Sat" && $day != "Sun") && ! in_array($date, magia_holidays_belgium($Y)) ){
//            $new_date = magia_dates_add_day($date, 1); 
//            echo $i .  "<br>"; 
//            $i++;             
//        }
//    }
//    
//    
//    
//    return $day;
}

/**
 * Diferencia entre dos fechas
 * @param type $date_start Fecha de inico 
 * @param type $date_end fecha de fin
 * @return type dias de diferencia
 */
function magia_dates_day_between($date_start, $date_end) {
    $start = strtotime($date_start . "+0 day");
    $end = strtotime($date_end . "+0 day");
    $res = $end - $start;
    return $res;
}

/**
 * Recibo mes en int y regreso mes en String
 * @param type $m
 * @return string
 */
function magia_dates_month_add($date, $m) {
    /**
     * 
      $stop_date = '2009-09-30 20:24:00';
      echo 'date before day adding: ' . $stop_date;
      $stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' +1 day'));
      echo 'date after adding 1 day: ' . $stop_date;
     */
    $new_date = date('Y-m-d H:i:s', strtotime($date . "+$m month"));
    return $new_date;
}

function magia_dates_month($m) {
    if ($m == null || $m == "" || $m == false) {
        return null;
    }
    $m = abs($m);
    if ($m > 12 || $m < 1 || !is_int($m)) {
        return null;
    }
    $months = array(
        1 => "January",
        2 => "February",
        3 => "March",
        4 => "April",
        5 => "May",
        6 => "June",
        7 => "July",
        8 => "August",
        9 => "September",
        10 => "October",
        11 => "November",
        12 => "December");

    if ($m) {
        return $months[$m];
    } else {
        return null;
    }
}

/**
 * Recibo dia en int y regreso dia en string 1 = Lunes
 * @param type $d
 * @return string
 */
function magia_dates_day($d) {
    $d = abs($d);
    if ($d > 7 || $d < 1 || !is_int($d)) {
        return null;
    }
    $days = array(
        1 => "Monday",
        2 => "Tuesday",
        3 => "Wednesday",
        4 => "Thursday",
        5 => "Friday",
        6 => "Saturday",
        7 => "Sunday");

    if ($d) {
        return $days[$d];
    } else {
        return null;
    }
}

/**
 * obtengo el año YYYY de una fecha dada
 * @param type $date
 * @return boolean
 */
function magia_dates_get_year_from_date($date) {
    if (!$date) {
        return false;
    }
    $Y = date('Y', strtotime($date));
    return $Y;
}

/**
 * 
 * @param type $date
 * @return boolean
 */
function magia_dates_get_month_from_date($date) {
    if (!$date) {
        return false;
    }
    $m = date('m', strtotime($date));
    return $m;
}

/**
 * Obtengo el 
 * @param type $date
 * @return boolean
 */
function magia_dates_get_day_from_date($date) {
    if (!$date) {
        return false;
    }
    $w = date('w', strtotime($date));
    return $w;
}

function magia_dates_last_day_from_date($date) {
//    $a_date = "2009-11-23";
    $a_date = $date;

    $date = new DateTime($a_date);
    $date->modify('last day of this month');
    return $date->format('Y-m-d');
}

function magia_dates_first_day_from_date($date) {
//    $a_date = "2009-11-23";
    $a_date = $date;

    $date = new DateTime($a_date);
    $date->modify('first day of this month');
    return $date->format('Y-m-d');
}

function magia_dates_transform_date($date) {
    // Intenta crear un objeto DateTime a partir de la fecha proporcionada
    $dateObj = DateTime::createFromFormat('d/m/Y', $date);

    if (!$dateObj) {
        // Si falla, intenta otros formatos comunes
        $dateObj = DateTime::createFromFormat('m/d/Y', $date);
        if (!$dateObj) {
            $dateObj = DateTime::createFromFormat('Y-m-d', $date);
            if (!$dateObj) {
                return false; // La fecha no es válida
            }
        }
    }

    return $dateObj->format('Y-m-d');
}

//------------------------------------------------------------------------------
//-------- TIME ----------------------------------------------------------------
//------------------------------------------------------------------------------

function magia_dates_calculate_time($times) {
    $i = 0;
    foreach ($times as $time) {
        sscanf($time, '%d:%d:%d', $hour, $min, $seg);
        $i = $i + (($hour * 60 + $min) * 60 ) + $seg;
    }

    if ($h = floor($i / 60)) {
        $i %= 60;
    }

    return sprintf('%02d:%02d', $h, $i);
}

function magia_dates_time_to_sec($time) {

    $times = explode(":", $time);

    ($h = $times[0]);
    ($m = $times[1]);
    ($s = $times[2]);

    $sec = ($h * 3600) + ($m * 60 ) + $s;

    return $sec;
}

//
function magia_dates_sec_to_time($sec) {

    // se usa para calcular
    return gmdate("H:i:s", $sec);
}

/**
 * in 13:35:45 > out 13:45  
 * @param type $time
 * @return string
 */
function magia_dates_time_format($time) {

    $times = explode(":", $time);
    ($h = $times[0]);
    ($m = $times[1]);
    ($s = $times[2]);
    $time_formated = $h . ':' . $m;
    return $time_formated;

    //$date = '9:25';
    //echo date('H:i', strtotime($date));
//    if(!$time){
//        return false;
//    }
//    return date('H \h i', strtotime($time));
    //  return date('H:i', strtotime($time));
}

//
//
//
//
//
//
/** Actual month last day * */
function magia_dates_last_month_day($month = null, $year = null) {
    $m = $month ?? date('m');
    $y = $year ?? date('Y');

    $day = date("d", mktime(0, 0, 0, $m + 1, 0, $y));

    return date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));
}

/** Actual month first day * */
function magia_dates_first_month_day($month = null, $year = null) {
    $m = $month ?? date('m');
    $y = $year ?? date('Y');
    return date('Y-m-d', mktime(0, 0, 0, $m, 1, $y));
}
