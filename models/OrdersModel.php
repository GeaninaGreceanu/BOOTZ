<?php

namespace app\models;

class OrdersModel {
    public array $orders = [];
    public function initUsers($orders)
    {
        $this->orders = $orders;
    }

    public function addOrder($order) {
        array_push($this->orders, $order);
    }

    public function getOrders() {
        return $this->orders;
    }
    
}