<?php
    setcookie('login', $login, -3600, '/');
    setcookie('password', $password, -3600, '/');
    header('Location: /index.php');