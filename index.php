<?php
require __DIR__ . '/auth.php';
$login = getUserLogin();
?>

<html>
<head>
    <title>Фотоальбом</title>
</head>
<body>
    <h1>Мой фотофальбом</h1>
    <?php if($login === null): ?>
        <a href="/login.php">Авторизируйтесь</a>
    <?php else : ?>
        Добро пожаловать, <?= $login; ?>  |  
        <a href="/logout.php">Выйти</a>
    <?php endif; ?>
    <br>
    <br>
    <a href="/upload.php">Добавить фото</a><br>
    <a href="/feedback.php">Оставить отзыв</a><br>

    <?php 
    $files = (scandir(__DIR__ . '/uploads'));
    $links = [];

    foreach($files as $fileName){
        if($fileName  === '.' || $fileName  === '..'){
            continue;
        }
        $links[] = 'http://test/uploads/' . $fileName;
    }

    // var_dump($files);
    // var_dump($links);

    foreach($links as $link) : ?>
    <a href="<?= $link ?>">
        <img src="<?= $link ?>" alt="" height="150px">
    </a>
    <!-- <br> -->
    <a href="/delete.php">Удалить фото</a>
    <!-- <a href="unlink($link);">Удалить фото</a> -->
    <?php 
    // unlink($link);
    // unlink('test.html');
    ?>
    <?php endforeach; ?>

    
</body>
</html>

