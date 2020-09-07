<?php

namespace app\models;

class ChartModel {
    public array $data;
    
    public function addAllData($data) {
        $this->data = $data;
    }

    public function addData($data) {
        array_push($this->data, $data);
    }
}