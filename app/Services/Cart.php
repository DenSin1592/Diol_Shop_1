<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class Cart
{
    public $items = null;
    public $totalPrice = 0;
    public $totalCount = 0;

    public function __construct( $oldCart)
    {
        if ($oldCart){
            $this->items = $oldCart->items;
            $this->totalCount = $oldCart->totalCount;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addOrDeleteProducts(Model $product,  $id)
    {
        $storedItem = $this->checkProduct($product , $id);

        if(!$storedItem['count']){
            $storedItem['count']++;
            $storedItem['count'] > 1 ? 1 : $storedItem['count'];
            $storedItem['price'] = $storedItem['price'] + $product->price;
            $this->items[$id] = $storedItem;
            $this->totalCount++;
            $this->totalPrice = $this->totalPrice + $product->price;

        } else{
            if ($storedItem['count']){
                $storedItem['count']--;
                $storedItem['price'] = $storedItem['price'] - $product->price;
                unset($this->items[$id]);
                $this->totalCount--;
                $this->totalPrice = $this->totalPrice - $product->price;
            }
            if($storedItem['count'] == 0){
                unset($this->items[$id]);
            }
            if($this->totalCount <= 0){
                $this->totalCount = 0;
                $this->totalPrice = 0;
                $this->items = [];
            }
        }
        unset($storedItem);
    }

    public function checkProduct(Model $product, $id)
    {
        $storedItem = ['count' => 0, 'price' => $product->price, 'item' => $product];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        return $storedItem;
    }
}
