<?php

require __DIR__ . '/auth.php';

if(getUserLogin())
{
    header('Location: /index.php');
}

if(!empty($_POST)){
    // require __DIR__ . '/auth.php';

    
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    // if(checkAuth($login, $password)) {
    //     header('Location: /index.php');
    // }


    if(checkAuth($login, $password)) {
        setcookie('login', $login, 0, '/');
        setcookie('password', $password, 0, '/');
        header('Location: /index.php');
    } else {
        $error = 'Ошибка авторизации';
    }
}

?>

<html>
<head>
    <title>Форма авторизации</title>
</head>
<body>
    <?php if(isset($error)) : ?>
        <span style="color: red;">
            <?= $error; ?>
        </span>
    <?php endif; ?>

    <?php var_dump($_COOKIE); ?>
    <!-- <?php var_dump($_COOKIE['login']); ?> -->
    <?php var_dump($login); ?>

    <h1>Форма авторизации</h1>
    <h3>Для авторизации ведите логин и пароль:</h3>
    <form action="/login.php" method="post">
        <label for="login">Имя пользователя: </label><input type="text" name="login" id="login">
        <br>
        <label for="password">Пароль: </label><input type="password" name="password" id="password">
        <br>
        <input type="submit" value="Войти">
    </form>
    <a href="/index.php">Главная страница</a>
</body>
</html>