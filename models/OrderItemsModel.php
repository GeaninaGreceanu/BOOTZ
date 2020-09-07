<?php

namespace app\models;

class OrderItemsModel {
    public string $orderNo, $ean, $name, $priceItem;
    
    public function __construct($ean, $name, $priceItem)
    {
        $this->ean = $ean;
        $this->name = $name;
        $this->priceItem = $priceItem;
    }

    public function setOrderNo($orderNo) {
        $this->orderNo =$orderNo;
    }
}