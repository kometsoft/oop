<?PHP

include_once 'library.php';
include_once 'User.php';

$objUser = new User(); //instantiate
$arrUser = $objUser->search();

// echo "<PRE>";
// print_r($arrUser);
if ($_GET['msg'] == 'deleted') {
    $class = 'alert alert-danger';
    $message = "Rekod berjaya dihapuskan";
} elseif ($_GET['msg'] == 'success') {
    $class = 'alert alert-success';
    $message = "Rekod berjaya disimpan";
} elseif ($_GET['msg'] == 'updated') {
    $class = 'alert alert-success';
    $message = "Rekod berjaya dikemaskini";
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<div class="container">
    <div class="<?= $class; ?> mt-4" role="alert" <?= $style; ?>>
        <?= $message; ?>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">List of Users</li>
        </ol>
    </nav>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?PHP
            //loop records using foreach
            $i = 1;
            foreach ($arrUser as $curUser) {
            ?>
                <tr>
                    <th scope="row"><?= $i++; ?>.</th>
                    <td><?= $curUser->getName(); ?></td>
                    <td><?= $curUser->getAge(); ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="location.href='edit.php?id=<?= $curUser->getId(); ?>'">Edit</button>
                        <button type="button" class="btn btn-danger" onclick="location.href='delete.php?id=<?= $curUser->getId(); ?>'">Delete</button>
                    </td>
                </tr>
            <?PHP
            }
            ?>

        </tbody>

    </table>
    <p align="center"><button type="button" class="btn btn-light" onclick="location.href='form.html'">Add</button></p>
</div>