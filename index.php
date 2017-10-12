<?php
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

if (isset($_POST['login']) AND $_POST['pass']) {
    $login_inp = $_POST["login"];
    $pass_inp = $_POST["pass"];

    $login = mysqli_real_escape_string($connection, $login_inp);
    $password = mysqli_real_escape_string($connection, $pass_inp);
    $result = mysqli_fetch_assoc(mysqli_query($connection, "SELECT login, pass FROM `user_pass` WHERE `login`='" . mysqli_real_escape_string($connection, $login_inp) . "' LIMIT 1"));
    if ($result['pass'] === $pass_inp) {
        //Логин успешен
        header("Location: user_page.php");
        session_start();
        $_SESSION["logged_user"] = $login_inp;
    } else header("Location: index.html");
    exit();
} else header("Location: index.html");

