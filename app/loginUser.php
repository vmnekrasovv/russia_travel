<div class="sign-in">
	<form id="signIn" action="loginUser.php" class="sign-in__form" method="post">
	    <input type="text" name="username" placeholder="Username" autocomplete="off">
	    <input type="password" name="password" placeholder="Password" autocomplete="off">
	    <input type="hidden" name="login">
	    <input type="submit" value="login" class="sign-in__submit">
	</form>
</div>

<?php

	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
	   
	    require_once 'db.php';
	    require_once 'sendQuery.php';

	    $username = $_POST['username'];
	    $password = $_POST['password'];

	    $sql = "SELECT * FROM users WHERE username = '$username'";
	    $result = sendQuery($conn, $sql);

	    $row = mysqli_fetch_assoc($result);

	    if ($row['username']) {

	        if (password_verify($password, $row['password'])) {
	            $_SESSION['username'] = $username;
	            header("Location: index.php");
	            exit();
	        } else {
	            echo "<div class='notice'>Invalid username or password</div>";
	        }
	    } else {
	        echo "<div class='notice'>User not found</div>";
	    }
	}
?>

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

    .sign-in {
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

    .sign-in__form {
        display: flex;
        align-items: center;
        gap: 25px;
        flex-wrap: wrap;
        padding: 80px 40px;
        background: rgba(30,30,30,.95);
        box-shadow: 0 5px 11px -4px rgba(10,10,10,.9);
    }

    .sign-in__form input {
        width: 70%;
        margin-left: 17.5%;
        padding: 15px;
        border: 1px solid #222;
    }

    .sign-in__form .sign-in__submit {
        display: inline-block;
        padding: 20px;
        background: #2c2c2c;
        cursor: pointer;
        transition: .33s;
        color: #eee;
    }

   	.sign-in__submit:hover {
        color: #fff;
        background: #222;
    }

</style>