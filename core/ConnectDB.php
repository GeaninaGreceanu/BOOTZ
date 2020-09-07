<?php

namespace app\core;
use mysqli;

class ConnectDB {
    public static mysqli $mysqli;
    
    public function connect() {
        $host = '127.0.0.1';
        $user = 'root';
        $pass = '';
        $db = 'bootz_db';
        $port = '3307';
        self::$mysqli = new mysqli($host, $user, $pass, $db, $port);
        if(self::$mysqli->errno !== 0)
            echo '<script type="text/javascript">alert("' . self::$mysqli->error . '")</script>';
    }

}



