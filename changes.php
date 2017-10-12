<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12.10.17
 * Time: 11:13
 */
session_start();

$connection = mysqli_connect("localhost", "root", "root");
if (!$connection) {
    die("Database connection failed: " . mysqli_error());
    echo "База недоступна<br/>";
}
//else echo "База доступна<br/>";
mysqli_set_charset($connection, "utf8");
$db_select = mysqli_select_db($connection, "blog");
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}

$login_logged = mysqli_real_escape_string($connection, $_SESSION['logged_user']);
$result_reg = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `user_pass` WHERE `login`='" . mysqli_real_escape_string($connection, $login_logged) . "' LIMIT 1"));



?>

<!doctype html>
<html lang="rus">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="reg">
    <table border="1" style="border: solid">
        <tr>
            <th colspan="3">Регистрация</th>
        </tr>
        <tr>
            <td>Логин</td>
            <td>Пароль</td>
            <td>Email</td>
        </tr>
        <form enctype="multipart/form-data" action="redactor.php" method="post">
            <tr>
                <td>
                    <input type="text" name="login" placeholder='<?php echo $result_reg["login"] ?>'>
                </td>
                <td>
                    <input type="password" name="pass" placeholder="Изменить пароль">
                </td>
                <td>
                    <input type="email" name="email"placeholder='<?php echo $result_reg["email"] ?>'>
                </td>
            </tr>
            <tr>
                <td>Имя</td>
                <td>Фамилия</td>
                <td>Отчество</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="_name" placeholder='<?php echo $result_reg["_name"] ?>'>
                </td>
                <td>
                    <input type="text" name="surname" placeholder='<?php echo $result_reg["surname"] ?>'>
                </td>
                <td>
                    <input type="text" name="middle_name" placeholder='<?php echo $result_reg["middle_name"] ?>'>
                </td>
            <tr>
                <td>Дата рождения</td>
                <td>Пол</td>
                <td>Фото</td>
            </tr>
            <td>
                <input type="date" name="date_birth" placeholder="<?php echo $result_reg["date_birth"] ?>">
            </td>
            <td>
                Неизменяемо
            </td>
            <td>
                <input type="file" name="avatar" accept="image/png,image/jpeg">
            </td>
            <tr>
                <td>Хобби</td>
                <td>Статус</td>
                <td>О себе</td>
            </tr>
            <td>
                <input type="text" name="hobbie" placeholder='<?php echo $result_reg["hobbie"] ?>'>
            </td>
            <td>
                Работаю: <input type="radio" name="status" value="working">
                Студент: <input type="radio" name="status" value="student">

            </td>
            <td>
                <textarea rows="10" cols="45" name="about" placeholder='<?php echo $result_reg["about"] ?>'></textarea>
            </td>
            <tr>
            <tr>
                <td colspan="3"><input type="submit"></td>
            </tr>
        </form>
    </table>
</div>
</body>
</html>
