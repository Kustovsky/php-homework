<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12.10.17
 * Time: 12:01
 */

session_start();

$connection = mysqli_connect("localhost", "root", "root");
if (!$connection) {
    die("Database connection failed: " . mysqli_error());
    echo "База недоступна<br>";
}
//else echo "База доступна<br/>";
mysqli_set_charset($connection, "utf8");
$db_select = mysqli_select_db($connection, "blog");
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}

$login_logged = mysqli_real_escape_string($connection, $_SESSION['logged_user']);
$result_reg = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `user_pass` WHERE `login`='" . mysqli_real_escape_string($connection, $login_logged) . "' LIMIT 1"));
$id = $result_reg['id_user'];

foreach ($_POST as $key => $value) {
    if ($value != null) {
        $q_val = mysqli_real_escape_string($connection, $value);
        $q_key = mysqli_real_escape_string($connection, $key);
        $sql = "UPDATE user_pass SET $q_key='$q_val' WHERE id_user=$id";
        if (mysqli_query($connection, $sql)) {
            header("Location: deauth.php");
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
            //mysqli_query($connection, "UPDATE user_pass SET '$q_val' = '$q_key' WHERE `login`='\" . mysqli_real_escape_string($connection, $login_logged)"));
        }
    }
}
