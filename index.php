<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задачник</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
</head>
<body>
    <header id="header">
        <?php require "view/header.php"; ?>
        
    </header>
    <section class="section-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="features_items">
                        <br/>

                        <?php require "render_table.php" ?>
                                 
                    </div>
                    <div class="col-sm-4 mx-auto col-sm-offset-4">
                        <div class="signup-form text-center">
                            <h3>Новая задача</h3>
                            <br/>
                            <form action="conf/db.php" method="post">
                                <input type="hidden" name="refferer" value="index.php">
                                <p>Имя (только буквы, цифры  и пробелы):</p><input class="form-control" id="f_name" type="text" name="f_name" placeholder="Name" required/>
                                <p>Email:</p><input class="form-control" id="email" type="email" name="email" placeholder="E-mail" required>
                                <p>Описание задачи (не менее 3 символов):</p><textarea class="form-control" id="f_description" name="f_description" required></textarea>
                                <br/><br/>
                                <input  class="btn btn-warning" type="submit" name="submit" class="btn btn-default" value="Отправить">
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>