<?php
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <table border=2px>
        <tr>
            <td>Пользователь:
                <?php
                session_start();
                echo $_SESSION["logged_user"];
                ?>
            </td>
            <td><img height=50px src=' <?php echo "photos/" . $result_reg["avatar"] ?>'></td>
            <td><a href="deauth.php">Выход</a></td>
        </tr>
        <tr>
            <td>Логин: <?php echo $result_reg["login"] ?> </td>
            <td>Email: <?php echo $result_reg["email"] ?></td>
            <td>Пароль: <?php echo $result_reg["pass"] ?></td>
        </tr>
        <tr>
            <td>Имя: <?php echo $result_reg["_name"] ?></td>
            <td>Фамилия: <?php echo $result_reg["surname"] ?></td>
            <td>Отчество: <?php echo $result_reg["middle_name"] ?></td>
        </tr>
        <tr>
            <td>Дата рождения: <?php echo $result_reg["date_birth"] ?></td>
            <td>Пол: <?php echo $result_reg["gender"] ?></td>
            <td>Хобби: <?php echo $result_reg["hobbie"] ?></td>
        </tr>
        <tr>
            <td>Статус: <?php echo $result_reg["_status"] ?></td>
            <td>О себе: <?php echo $result_reg["about"] ?></td>
            <td></td>
        </tr>
    </table>
</head>
<body>

</body>
</html>