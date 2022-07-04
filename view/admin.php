<?php require_once "header.php" ?>
        
    <section class="section-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="features_items">
                        <br/>

                        <?php require_once "render_table.php" ?>
                                 
                    </div>
                    <div class="col-sm-4 mx-auto col-sm-offset-4">
                        <div class="signup-form text-center">
                            <h3>Новая задача</h3>
                            <br/>
                            <form action="../conf/db.php" method="post">
                                <input type="hidden" name="refferer" value="admin.php">
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