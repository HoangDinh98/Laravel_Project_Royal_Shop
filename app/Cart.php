<?php

namespace App;

class Cart {

    public $items;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart) {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        } else {
            $this->items = null;
        }
    }

    public function add($item, $id) {
        $storedItem = [
            'qty' => 0,
            'sum_price' => round($item->price*(1 - 0.01*$item->promotion->value)),
            'item' => $item
        ];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty'] ++;
        $current_price  = round($item->price*(1 - 0.01*$item->promotion->value));
        $storedItem['sum_price'] = $current_price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $current_price;
    }

    public function deleteByOne($id) {
        $this->items[$id]['qty']--;
        $current_price = round($this->items[$id]['item']->price*(1 - 0.01*$this->items[$id]['item']->promotion->value));
        $this->items[$id]['sum_price'] -= $current_price;
        $this->totalQty--;
        $this->totalPrice -= $current_price;

        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id) {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['sum_price'];
        unset($this->items[$id]);
    }

}
