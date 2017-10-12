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
        <form enctype="multipart/form-data" action="reg.php" method="post">
            <tr>
                <td>
                    <input type="text" name="login_reg">
                </td>
                <td>
                    <input type="password" name="pass_reg">
                </td>
                <td>
                    <input type="email" name="email">
                </td>
            </tr>
            <tr>
                <td>Имя</td>
                <td>Фамилия</td>
                <td>Отчество</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="name">
                </td>
                <td>
                    <input type="text" name="surname">
                </td>
                <td>
                    <input type="text" name="middle_name">
                </td>
            <tr>
                <td>Дата рождения</td>
                <td>Пол</td>
                <td>Фото</td>
            </tr>
            <td>
                <input type="date" name="date_birth">
            </td>
            <td>
                <select name="gender">
                    <option value="male">Мужской</option>
                    <option value="female">Женский</option>
                </select>

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
                <input type="text" name="hobbie">
            </td>
            <td>
                Работаю: <input type="radio" name="status" value="working">
                Студент: <input type="radio" name="status" value="student">

            </td>
            <td>
                <textarea rows="10" cols="45" name="about"></textarea>
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