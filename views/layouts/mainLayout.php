<?php
use app\controllers\AppController;
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Bootz Assignment</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: rgb(17,73,123)!important;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav mr-auto" style="margin:auto">
                <li <?php if (AppController::$viewName === 'home') echo 'class="nav-item active"'; else echo 'class="nav-item"' ?>>
                    <a class="nav-link" href="/"><h3>Home</h3></a>
                </li>
                <li <?php if (AppController::$viewName === 'users') echo 'class="nav-item active"'; else echo 'class="nav-item"' ?>>
                    <a class="nav-link" href="/users"><h3>Users</h3></a>
                </li>
                <li <?php if (AppController::$viewName === 'orders') echo 'class="nav-item active"'; else echo 'class="nav-item"' ?>>
                    <a class="nav-link" href="/orders"><h3>Orders</h3></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container" style="margin-top:1.5%">
        {{content}}
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>