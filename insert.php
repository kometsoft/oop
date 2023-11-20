<?PHP

include_once 'library.php';
include_once 'User.php';

$objUser = new User(); //instantiate
$objUser->setName($_POST['name']); //using setter
$objUser->setAge($_POST['age']);
$objUser->insert(); //call method NoSQL
// echo $objUser->getId();
// exit;
//redirect
//audittrail
//send out email
//background process as a queue
//DB Transaction
header("Location: list.php?msg=success");




// echo "<PRE>";
// print_r($_POST);
// exit;