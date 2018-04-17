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
//use Illuminate\Support\Collection;
//use Illuminate\Database\Eloquent\Model;
//use App\Http\Controllers\Controller;
//use Illuminate\Database\Eloquent\Model;

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

    public static function standardize_data($data, $is_name) {
        $data = preg_replace('/\s{2,}/', ' ', $data);
        $data = trim($data);
        if ($is_name == 1) {
            $data = title_case($data);
//            $data = ucwords($data);
        } else {
            $data = ucfirst($data);
        }

        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    public static function product_group_active() {
        return '<div class="item active"> <div class="row">';
    }
    public static function product_group_notactive() {
        return '<div class="item"><div class="row">';
    }
    public static function product_group_end() {
        return '</div></div>';
    }

    public static function printProduct($products) {
        $result = '<div id="myCarouselOne" class="carousel slide"><div class="carousel-inner">';

        $step = 0;
        foreach ($products AS $product) {
            if ($step == 0) {
                $result.'<div class="item active"> <div class="row">';
            } elseif ($step != 0 && $step % 4 == 0) {
                $result.'<div class="item"><div class="row">';
            }
            $current_price = $product->price*(1 - 0.01*$product->promotion->value);
            
            $result.'<div class="span3"><div class="well well-small">'.
                    '<span class="newTag">'.
                    '</span><span class="priceTag">'.
                    '<small class="oldPrice">'.self::vn_currencyunit($product->price).'</small>'.
                    '<span class="newPrice">'.self::vn_currencyunit($product->price).'</span></span>'.
                    '<a class="displayStyle" href="'.route('product.index', $product->id).'"><img id="product-img-'.
                    $product->id.'" src=""></a>'.
                    '<h5>'.$product->name.'</h5>'.
                    '<p><span class="price" style="font-size: 16px">'.self::vn_currencyunit($current_price).'</span><br>'.
                    '<span><del>'.self::vn_currencyunit($product->price).'</del></span>&nbsp;&nbsp;'.
                    '<span>'.'- '.$product->promotion->value.' %</span>'.
                    '</p>'.
                    '<div class="addcart-box">'.
                    '<a class="btn btn-warning addcart" data-id="'.$product->id.'">Thêm vào <i class="icon-shopping-cart"></i></a>'.
                    '</div>'.
                    '</div></div>';
            if ($step % 4 == 3 || $step == $products->count()-1) {
                $result.'</div></div>';
            }
            
            $step++;
        }
        
        $result.'</div><a class="left carousel-control" href="#myCarouselOne" data-slide="prev">‹</a>'.
                '<a class="right carousel-control" href="#myCarouselOne" data-slide="next">›</a>'.
                '</div>';
        
        
        return $result;
        
    }

}
