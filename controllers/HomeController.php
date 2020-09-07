<?php

namespace app\controllers;

use app\core\Application;
use app\core\ConnectDB;
use DateTime;

class HomeController extends Controller{
    public static $data;
    public function renderView() {
        return Application::$app->router->appController->renderView('home');
    }
    public function getAllData() {
        $stats1 = [];
        $stats2 = [];
        $sql = "SELECT t1.createdOn, t1.orders, t2.users FROM (SELECT createdOn, count(orderNo) as orders FROM orders GROUP BY createdOn) t1 left JOIN
                (SELECT dateCreation, count(email) as users FROM customers GROUP BY dateCreation) t2 ON (t1.createdOn = t2.dateCreation)";
        if ($result = mysqli_query(ConnectDB::$mysqli, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    if($row['orders']===NULL) $row['orders'] = "0";
                    if($row['users']===NULL) $row['users'] = "0";
                    $stat = [$row['createdOn'], $row['orders'], $row['users']];
                    array_push($stats1, $stat);
                }
                mysqli_free_result($result);
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. ";
        }
        $sql = "SELECT createdOn, sum(totalPrice) as revenue FROM orders GROUP BY createdOn";
        if ($result = mysqli_query(ConnectDB::$mysqli, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $stat = [$row['createdOn'], $row['revenue']];
                    array_push($stats2, $stat);
                }
                mysqli_free_result($result);
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. ";
        }
        return [$stats1, $stats2];
        
    }
    public function postData() {}
}