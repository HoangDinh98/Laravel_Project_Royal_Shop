<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Helper
 *
 * @author hoang.dinh
 */
class Helper {

    public static function vn_currency(String $number) {
        return number_format($number, 0, ',', '.');
    }

    public static function vn_currencyunit(String $number) {
        return number_format($number, 0, ',', '.') . ' đ';
    }

    public static function vn_date($date) {
        return date_format($date, 'd/m/Y');
    }

    public static function order_no($number) {
        return sprintf("%09d", $number);
    }

    public static function diveid_name($fullname) {
        $split = explode(" ", $fullname);
        $firstname = array_pop($split);
        $lastname = implode(" ", $split);
        return ([
            'firstname' => $firstname,
            'lastname' => $lastname
        ]);
    }
    
    public static function diveid_add($address) {
        $split = explode(", ", $address);
        $city = array_pop($split);
        $district = array_pop($split);
        $town = array_pop($split);
        $village = implode(" ", $split);
        return ([
            'city' => $city,
            'district' => $district,
            'town' => $town,
            'village' => $village
        ]);
    }

}
