<?php

namespace app\models;

class OrderModel {
    public string $orderNo, $createdOn, $createdBy, $country, $device, $totalPrice;
    public function __construct($orderNo, $createdOn, $createdBy, $country, $device, $totalPrice)
    {
        $this->orderNo = $orderNo;
        $this->createdOn = $createdOn;
        $this->createdBy = $createdBy;
        $this->country = $country;
        $this->device = $device;
        $this->totalPrice = $totalPrice;
    }
}