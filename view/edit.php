<?php 
require_once '../conf/config.php';

if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $id = $conn->real_escape_string($_GET["id"]);
    $sql = "SELECT * FROM list WHERE id = '$id'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            foreach($result as $row){
                $id = $row['id'];
                $f_name = $row['f_name'];
                $email = $row['email'];
                $f_description = $row['f_description'];
                $state = $row['state'];
                $category = $row['category'];
            }
            require_once 'header.php';
            echo "<div class='container'>
                <h3>Редактирование задачи</h3>
                <form method='post'>
                    <input value='$id' id='id' type='hidden' name='id'/>
                    <p>Имя (только буквы, цифры  и пробелы):</p><input value='$f_name' class='form-control' id='f_name' type='text' name='f_name' placeholder='Name' required/>
                    <p>Email:</p><input value='$email' class='form-control' id='email' type='email' name='email' placeholder='E-mail' required>
                    <p>Описание задачи (не менее 3 символов):</p><textarea class='form-control' id='f_description' name='f_description' required>$f_description</textarea>
                    <p>Статус:</p><input class='form-check-input' id='state' type='checkbox' name='state' /><label class='form-check-label' for='state'>
                    Выполнено</label>
                    <input value='$category' id='category' type='hidden' name='category'/>
                    <br/><br/>
                    <input class='btn btn-warning' type='submit' name='submit' class='btn btn-default' value='Отправить'>
            </form>
            </div>";
        }
        else{
            echo "<div>Неть</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: " . $conn->error;
    }
}
elseif (isset($_POST["f_name"]) && isset($_POST["email"]) && isset($_POST["f_description"]) /*&& isset($_POST["state"]) */&& isset($_POST["category"])) {
    if ($_POST["state"] == 'on') {
        $state = 'Выполнено';
        $category = 'Проверено администратором';
    } else {
        $state = 'В процессе';
        $category = 'Не проверено';
    }
    $id = $conn->real_escape_string($_POST["id"]);
    $f_name = $conn->real_escape_string($_POST["f_name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $f_description = $conn->real_escape_string($_POST["f_description"]);
    $sql = "UPDATE list SET f_name = '$f_name', email = '$email', f_description = '$f_description', state = '$state', category = '$category' WHERE id = '$id'";
    if($result = $conn->query($sql)){
        header("Location: admin.php");
    } else{
        echo "Ошибка: " . $conn->error;
    }
}
else {
    echo "Некорректные данные";
}
$conn->close();

?>
</body>
</html>
