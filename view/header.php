<?php 
    $base = basename($_SERVER['SCRIPT_NAME']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задачник</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row pt-3">
        <div class="col-sm-12 d-flex justify-content-between">
            <div class="contactinfo">
                <ul class="nav nav-pills">
                    <li class="me-2"><a href="#" class="btn btn-light"><i class="fa fa-regular fa-phone"></i> +7-960-368-46-23</a></li>
                    <li><a href="#" class="btn btn-light"><i class="fa fa-regular fa-envelope"></i> svetloriel@gmail.com</a></li>
                </ul>
            </div>
            <div class="pull-right">
                <ul class="nav navbar-nav">
                    <?php
                    
                    if ($base == 'index.php') {
                        echo '<li><a href="view/login.php" class="btn btn-light"><i class="fa fa-regular fa-user"></i> Вход для администратора</a></li>';
                    } elseif (($base == 'admin.php') or ($base == 'login.php')) {
                        echo '<li><a href="../index.php" class="btn btn-light"><i class="fa-regular fa-arrow-right-from-bracket"></i> Выход</a></li>';
                    }

                    ?>
                </ul>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="text-center">
                <h3>Задачник</h3>
            </div>
        </div>
    </div>
</div>