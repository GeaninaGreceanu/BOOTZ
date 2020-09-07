<?php

namespace app\controllers;

use app\core\Application;
use app\core\ConnectDB;
use app\models\UserModel;
use app\models\UsersModel;
use mysqli;

class UsersController extends Controller
{   
    public function renderView()
    {
        return Application::$app->router->appController->renderView('users');
    }
    public function getAllData() {
        $users = new UsersModel();
        $sql = "SELECT * FROM customers";
        if ($result = mysqli_query(ConnectDB::$mysqli, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $user = new UserModel($row['email'],$row['firstName'],$row['lastName'],$row['country'], $row['dateCreation']);
                    $users->addUser($user);
                }
                mysqli_free_result($result);
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. ";
        }
        return $users;
    }
    public function postData() {
        $email = $_POST['email'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $country = $_POST['country'];
        if($email === '' or $firstName=== '' or $lastName === '' or $country === '')
            echo '<script type="text/javascript">alert("Empty fields")</script>';
        else {
            $dateCreation = date("Y/m/d");
            $sql = "INSERT INTO customers (email, firstName, lastName, country, dateCreation) VALUES ('" . $email . "', '" . $firstName . "', '" .$lastName . "', '" .$country . "', '" .$dateCreation ."')";
            ConnectDB::$mysqli->query($sql);
            if(ConnectDB::$mysqli->errno !== 0)
                echo '<script type="text/javascript">alert("' . ConnectDB::$mysqli->error . '")</script>';
        }
        return $this->renderView();
    }

}
