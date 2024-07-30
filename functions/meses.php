<?php

/**
 * Created by: Magia_php
 * Author: Robinson Coello s.
 * Web: http://coello.be
 * E-mail: robincoello@hotmail.com
 * Date: 2020-04-22
 */
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

//1900-01-01
//0123-56-89

function dates_day_of_date($date) {

    if ($date) {
        return substr($date, 8, 2);
    }
    return false;
}

function dates_month_of_date($date) {

    if ($date) {
        return substr($date, 5, 2);
    }
    return false;
}

function dates_year_of_date($date) {

    if ($date) {
        return substr($date, 0, 4);
    }
    return false;
}
