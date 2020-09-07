<?php

namespace app\controllers;

use app\core\Application;
use app\core\ConnectDB;
use app\models\OrderItemsModel;
use app\models\OrderModel;
use app\models\OrdersModel;

class OrdersController extends Controller {
    public static OrdersModel $orders;
    public function renderView() {
        return Application::$app->router->appController->renderView('orders');
    }
    public function getAllData() {
        $orders = new OrdersModel();
        $sql = "SELECT * FROM orders";
        if ($result = mysqli_query(ConnectDB::$mysqli, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $order = new OrderModel($row['orderNo'],$row['createdOn'],$row['createdBy'],$row['country'],$row['device'],$row['totalPrice']);
                    $orders->addOrder($order);
                }
                mysqli_free_result($result);
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. ";
        }
        self::$orders = $orders;
        return $orders;
    }

    public function postData(){
        $products = [];
        $totalPrice = 0;
        $createdOn = $_POST['createdOn'];
        $country = $_POST['country'];
        if($createdOn === '' or $country === '' or !isset($_POST['items']))
            echo '<script type="text/javascript">alert("Empty fields")</script>';
        else {
        if(isset($_POST['items']))
            foreach ($_POST['items'] as $selectedOption) {
                $option = explode(", ", $selectedOption);
                $product = new OrderItemsModel($option[0], $option[1], $option[2]);
                $totalPrice += $option[2];
                array_push($products, $product);
            }
        
        $createdBy = $_POST['createdBy'];
        $device = $_SERVER['HTTP_USER_AGENT'];
        $sql = "INSERT INTO orders (createdOn, createdBy, country, device, totalPrice) VALUES ('" . $createdOn . "', '" . $createdBy . "', '" .$country . "', '" .$device . "', '" .$totalPrice . "')";
        ConnectDB::$mysqli->query($sql) or die(ConnectDB::$mysqli->error);
        $orderNo = ConnectDB::$mysqli->insert_id;
        foreach($products as $product) {
            $sql = "INSERT INTO orderItems (orderNo, ean, name, priceItem) VALUES ('" . $orderNo . "', '" . $product->ean . "', '" .$product->name . "', '" .$product->priceItem . "')";
            ConnectDB::$mysqli->query($sql);
            if(ConnectDB::$mysqli->errno !== 0)
                echo '<script type="text/javascript">alert("' . ConnectDB::$mysqli->error . '")</script>';
        }

        }
        return $this->renderView();
        
    }
    public function getAvailableProducts() {
        $products = [];
        $sql = "SELECT * FROM products";
        if ($result = mysqli_query(ConnectDB::$mysqli, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $product = $row['ean'] . ", " . $row['name'] . ", " . $row['price'];
                    array_push($products, $product);
                }
                mysqli_free_result($result);
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. ";
        }
        return $products;
    }

    public function getOrderItems() {
        $items = [];
        $sql = "SELECT * FROM orderItems";
        if ($result = mysqli_query(ConnectDB::$mysqli, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $item = new OrderItemsModel($row['ean'],$row['name'],$row['priceItem']);
                    $item->setOrderNo($row['orderNo']);
                    array_push($items, $item);
                }
                mysqli_free_result($result);
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. ";
        }
        return $items;
    }
}