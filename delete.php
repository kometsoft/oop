<?php

include_once 'library.php';
include_once 'User.php';

$objUser = new User();
$objUser->setId($_GET['id']); //get from URL
$objUser->delete();

header("Location: list.php?msg=deleted");
