<?php

    use app\controllers\UsersController;

    $controller = new UsersController();
    $model = $controller->getAllData();
    $data = $model->getUsers();
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">E-mail</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Country</th>
            <th scope="col">Date Creation</th>
        </tr>
    </thead>
    <?php foreach ($data as $row) : { ?>
            <tr>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->firstName; ?></td>
                <td><?php echo $row->lastName; ?></td>
                <td><?php echo $row->country; ?></td>
                <td><?php echo $row->dateCreation; ?></td>
            </tr>
        <?php } ?>
    <?php endforeach; ?>
</table>