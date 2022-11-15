<?php
$result = null;
$text = $_POST['text'] ?? '';

if(!empty($text)){
    $datetime = date(DATE_ATOM);
    $isWrote = file_put_contents(     // Пишет данные в файл
        __DIR__ . '/../private/feedback.txt', // Путь к записываемому файлу. 
        $datetime . PHP_EOL . $text . PHP_EOL . PHP_EOL, // Записываемые данные.
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
    <?php if($result !== null) : ?>
        <div><b><?= $result ?></b></div><br>
    <?php endif; ?>
    <form action="feedback.php" method="post">
        <label for="text">Введите ваше текст:</label><br><br>
        <textarea name="text" id="text" cols="55" rows="5"></textarea><br><br>
        <input type="submit" value="Отправить">
    </form>
</div>
    
</body>
</html>