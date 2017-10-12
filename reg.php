<?php
/**
 * Created by PhpStorm.
 * User: kustovsky
 * Date: 11.10.17
 * Time: 18:48
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
$_FILES['avatar']['tmp_name'];

if (!empty($_POST['login_reg'] AND $_POST['pass_reg'] AND $_POST['email'] AND $_POST['name'] AND $_POST['surname'] AND $_POST['middle_name'] AND $_POST['date_birth'] AND $_POST['gender'] AND $_POST['hobbie'] AND $_POST['status'] AND $_POST['about']) AND is_uploaded_file($_FILES['avatar']['tmp_name'])) {

    $login_reg = mysqli_real_escape_string($connection, $_POST['login_reg']);
    $pass_reg = mysqli_real_escape_string($connection, $_POST['pass_reg']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $surname = mysqli_real_escape_string($connection, $_POST['surname']);
    $middle_name = mysqli_real_escape_string($connection, $_POST['middle_name']);
    $date_birth = mysqli_real_escape_string($connection, $_POST['date_birth']);
    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    $hobbie = mysqli_real_escape_string($connection, $_POST['hobbie']);
    $status = mysqli_real_escape_string($connection, $_POST['status']);
    $about = mysqli_real_escape_string($connection, $_POST['about']);
    $avatar = mysqli_real_escape_string($connection, $login_reg . ".png");

    $result_reg = mysqli_fetch_assoc(mysqli_query($connection, "SELECT login, pass FROM `user_pass` WHERE `login`='" . mysqli_real_escape_string($connection, $login_reg) . "' LIMIT 1"));
    if ($result_reg['login'] === $login_reg) {
        //Юзер существует
        echo "Логин занят";
        echo "
        <form action=\"index.html\">
            <input type=\"submit\" value='Назад'>
        </form>
        ";

    } else {
        $query = "INSERT INTO blog.user_pass VALUES (NULL, '" . $login_reg . "', 
    '" . $pass_reg . "',
    '" . $email . "',
    '" . $name . "',
    '" . $surname . "',
    '" . $middle_name . "',
    '" . $date_birth . "',
    '" . $gender . "',
    '" . $hobbie . "',
    '" . $status . "',
    '" . $about . "',
    '" . $avatar . "'      
    )";
        move_uploaded_file($_FILES['avatar']['tmp_name'], 'photos/' . $_POST['login_reg'] . ".png");
        mysqli_query($connection, $query);
        echo "Зарегистрирован посетитель " . $login_reg;
        echo "
        <form action=\"index.html\">
            <input type=\"submit\" value='Назад'>
        </form>
        ";
    }
} else header("Location: index.html");
exit();

