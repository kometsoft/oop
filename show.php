<?php

include_once 'library.php';
include_once 'User.php';

$objUser = new User();
$objUser->setName($_GET['name']);//get from URL
$objUser->select();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<div class="container">
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Name : </label>
    <?=$objUser->getName(); ?>
    </div>
    <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Age : </label>
    <?=$objUser->getAge();?>
    </div>
</div>