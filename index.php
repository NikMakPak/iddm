<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="front-end/css/logind.css">
    <link rel="shortcut icon" href="front-end/img/favicon32.ico" type="image/x-icon">
    <title>Login - IDDM</title>
</head>

<body>
    <div class="login">
        <img src="front-end/img/logo.png" alt="logo">
        <h1>Авторизация</h1>
        <div class="center">
            <form action="index.php" method="POST">
                <div class="field">
                    <label for="dr-id">Ваш ID</label>
                    <input type="text" name="dr-id" required>
                </div>
                <div class="field">
                    <label for="dr-passw">Ваш пароль</label>
                    <input type="password" name="dr-passw" required>
                </div>
                <button type="submit">Войти</button>
            </form>
        </div>
        <?php include "actions/login.php"; ?>
    </div>
</body>

</html>