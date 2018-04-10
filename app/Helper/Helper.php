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
        return number_format($number, 0, ',', '.'). ' đ';
    }
}
