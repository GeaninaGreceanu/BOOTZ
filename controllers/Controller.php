<?php

namespace app\controllers;


abstract class Controller {
    abstract protected function renderView();
    abstract protected function getAllData() ;
    abstract protected function postData();
}