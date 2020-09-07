<?php

use app\controllers\OrdersController;
use app\controllers\UsersController;

$controller = new OrdersController();
$products = $controller->getAvailableProducts();
$userController = new UsersController();
$model = $userController->getAllData();
$data = $model->getUsers();
?>

<h1 style="text-align:center">Orders</h1>

<form action="" method="post">
  <div class="form-group">
    <label>Created On</label>
    <input type="date" value="<?php echo date("Y-m-d"); ?>" class="form-control" name="createdOn">
  </div>
  <div class="form-group">
    <label>Created By</label>
    <select class="custom-select" name="createdBy">
      <?php foreach ($data as $row) : { ?>
          <option> <?php echo $row->email;?></option>
        <?php  } ?>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Country</label>
    <input class="form-control" type="text" name="country">
  </div>
  <div class="form-group">
    <label>Items</label>
    <select class="custom-select" multiple name="items[]">
      <?php foreach ($products as $row) : { ?>
          <option> <?php echo $row; ?></option>
        <?php } ?>
      <?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br/>
<?php
require_once("../views/layouts/allOrders.php");
