<h1>Users</h1>
<form action="" method="post">
  <div class="form-group">
    <label>Email address</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label>First Name</label>
    <input class="form-control" name="firstName" type="text">
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input class="form-control" type="text" name="lastName">
  </div>
  <div class="form-group">
    <label>Country</label>
    <input class="form-control" type="text" name="country">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
require_once("../views/layouts/allUsers.php");