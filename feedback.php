<?php
require __DIR__ . '/auth.php';

if(!getUserLogin()){
    header('Location: /login.php');
}

$result = null;
$text = $_POST['text'] ?? '';
$email = $_POST['email'] ?? '';


// if(!empty($email)) { 
//     $resultEmail = $email;
//     if($resultEmail === null){
//         $error .= 'Поле email обязательно для заполнения! ';
//     }
// }


if(!empty($text) && !empty($email)){$login = getUserLogin();    // Получаем имя юзера
    $datetime = date(D$login = getUserLogin();    // Получаем имя юзераATE_ATOM);
    $login = getUserLogin();    // Получаем имя юзера
    $isWrote = file_put_contents(     // Пишет данные в файл
        __DIR__ . '/../private/feedback.txt', // Путь к записываемому файлу. 
        $datetime . PHP_EOL .  
        // 'Name: '. $loginFromCookie. PHP_EOL. 
        'Name: '. $login. PHP_EOL. 
        'email: '.  $email .  PHP_EOL . 
        'Text: '. $text . PHP_EOL . PHP_EOL , // Записываемые данные.
        FILE_APPEND  // данные будут дописаны в конец файла вместо того, чтобы его перезаписать. 
    ) !== false ;
    if($isWrote === false) {
        $result = 'Не удалось отправить сообщение, попробуйте ещё раз.';
    } else {
        $result = 'Ваше сообщение успешно отправлено!';
    }
}

?>
<html>
<head>
    <title>Обратная связь</title>
</head>
<body>
<div style="text-align: center;">
    <h1>Форма обратной связи</h1>
    <?php if(!empty($error)) : ?>
        <div style="color: red"><?= $error1 . $error2 ?></div>
    <?php endif; ?>
    <?php if($result !== null) : ?>
        <div><b><?= $result ?></b></div><br>
    <?php endif; ?>
    <form action="feedback.php" method="post">
        <label for="text">Введите ваше текст:</label><br><br>
        <textarea name="text" id="text" cols="50" rows="5"></textarea><br><br>
        <label for="email">Введите ваш email:</label><br><br>
        <input type="text" name="email" id="email" value="<?= $_POST['email'] ?? '' ?>" size="51"><br><br>
        <input type="submit" value="Отправить">
    </form>
</div>
    
</body>
</html>