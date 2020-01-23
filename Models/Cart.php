<?php

class Cart {
    private $numberOfItems
    private $idItemsArry
    public function __construct(){
        $this->numbersOfItems = 0;
        $this->idItemsArry = arry();
    }

    public function getNumberOfItems():int{
        return $this->numberOfItems;
    }
    public function getItemID(int $id):int{
        return $this->idItemArry[$id];
    }
    public function addItemToCart(int $itemID){
        array_push($this->idItemsArry,$itemID);
        $this->numbersOfItems++;
    }

}