<?PHP

include_once 'library.php';
include_once 'User.php';

$objUser = new User(); //instantiate
$objUser->setId($_POST['id']);
$objUser->setAge($_POST['age']);
$objUser->update(); //call method NoSQL

//redirect
header("Location: list.php?msg=updated");
