<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $f_name = trim($_REQUEST['f_name']);
    $email = trim($_REQUEST['email']);
    $f_description = trim($_REQUEST['f_description']);
    $state = 'В процессе';
    $category = 'Не проверено';

    $refferer = trim($_REQUEST['refferer']);
 
    $conn -> query ("INSERT INTO list (f_name, email, f_description, state, category) VALUES ('$f_name', '$email', '$f_description', '$state', '$category')");

    if ($refferer == 'admin.php') {
        header("Location: ../view/admin.php");
    } elseif ($refferer == 'index.php') {
        header("Location: ../index.php");
    }
}
exit;