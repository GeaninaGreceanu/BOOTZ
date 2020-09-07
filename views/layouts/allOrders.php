<?php

use app\controllers\OrdersController;

$controller = new OrdersController();
$orderModel = $controller->getAllData();
$data = $orderModel->getOrders();
$items = $controller->getOrderItems();
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Order Number</th>
            <th scope="col">Created On</th>
            <th scope="col">Created By</th>
            <th scope="col">Country</th>
            <th scope="col">Device</th>
            <th scope="col">Total Price</th>
        </tr>
    </thead>
    <?php foreach ($data as $row) : { ?>
            <tr>
                <td><?php echo $row->orderNo; ?></td>
                <td><?php echo $row->createdOn; ?></td>
                <td><?php echo $row->createdBy; ?></td>
                <td><?php echo $row->country; ?></td>
                <td><?php echo $row->device; ?></td>
                <td><?php echo $row->totalPrice; ?></td>
            </tr>
        <?php } ?>
    <?php endforeach; ?>
    
</table>
<br/>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Order Number</th>
            <th scope="col">EAN</th>
            <th scope="col">Name</th>
            <th scope="col">Price Item</th>
        </tr>
    </thead>
    <?php foreach ($items as $row) : { ?>
            <tr>
                <td><?php echo $row->orderNo; ?></td>
                <td><?php echo $row->ean; ?></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->priceItem; ?></td>
            </tr>
        <?php } ?>
    <?php endforeach; ?>
    
</table>