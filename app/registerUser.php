<?php

    session_id($_COOKIE['PHPSESSID']);
    session_start();

    require_once "db.php";
    require_once "sendQuery.php";

    // Функция для регистрации нового пользователя
    function registerUser($conn, $username, $email, $password) {

        $sql = "SELECT * from users where username = '". $username ."'";
        $result = sendQuery($conn, $sql);

        if($row = mysqli_fetch_assoc($result)) {
           return false;
        }

        // Хэшируем пароль
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Формируем и выполняем запрос к базе данных для добавления нового пользователя
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
        $result = sendQuery($conn, $sql);

        // Проверяем, была ли успешно выполнено добавление записи в базу данных
        if ($result) {
            return true; // Возвращаем true в случае успеха
        } else {
            return false; // Возвращаем false в случае ошибки
        }
    }

    // Пример использования функции для регистрации нового пользователя
    if (isset($_POST['register']) && $_SESSION['username'] == 'admin') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (registerUser($conn, $username, $email, $password)) {
            echo "<span class='notice'>Пользователь успешно зарегистрирован!</span>";
        } else {
            echo "<span class='notice'>Произошла ошибка при регистрации пользователя.</span>";
        }   
    }
?>

<div class="sign-up">
    <form id="signUp" action="registerUser.php" class="sign-up__form" method="POST">
        <input type="text" name="username" placeholder="Username" autocomplete="off">
        <input type="text" name="email" placeholder="Email" autocomplete="off">
        <input type="text" name="password" placeholder="Password" autocomplete="off">
        <input type="hidden" name="register">
        <input type="submit" value="add user" class="sign-up__submit">
    </form>
</div>

<style>

    .notice {
        color: #fff;
        display: block;
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 11111111111111;
        font-size: 25px;
    }

    .sign-up {
        width: 100vw;
        height: 100vh;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 9999;
        background: rgba(10,10,10,.95);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sign-up__form {
        display: flex;
        align-items: center;
        gap: 25px;
        flex-wrap: wrap;
        padding: 80px 40px;
        background: rgba(30,30,30,.95);
        box-shadow: 0 5px 11px -4px rgba(10,10,10,.9);
    }

    .sign-up__form input {
        width: 70%;
        margin-left: 17.5%;
        padding: 15px;
        border: 1px solid #222;
    }

    .sign-up__form .sign-up__submit {
        display: inline-block;
        padding: 20px;
        background: #2c2c2c;
        cursor: pointer;
        transition: .33s;
        color: #eee;
    }

    .sign-up__submit:hover {
        color: #fff;
        background: #222;
    }

</style>
