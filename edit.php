<?php

include_once 'library.php';
include_once 'User.php';

$objUser = new User();
$objUser->setId($_GET['id']); //get from URL
//if exists()
$objUser->select();

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<div class="container">
  <form method="POST" action="update.php">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name: </label>
      <?= $objUser->getName(); ?>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Age</label>
      <input type="number" name="age" value="<?= $objUser->getAge(); ?>" class="form-control" id="exampleInputPassword1">
    </div>
    <input type=hidden name="id" value="<?= $objUser->getId(); ?>">
    <button type="submit" class="btn btn-primary">Kemaskini</button>
  </form>
</div>