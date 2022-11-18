<!-- Загрузка файлов на сервер  -->
<!-- https://php.zone/kurs-php-dlya-nachinayushih/kak-zagruzit-fayl-na-server-v-php -->

<?php

require __DIR__ . '/auth.php';
$login = getUserLogin();


if(!empty($_FILES['attachment'])){
    // var_dump($_FILES);
    $file = $_FILES['attachment'];
    var_dump($file);
    
    $srcFileName = $file['name'];
    // var_dump($srcFileName);
    
    $newFilePath = __DIR__. '\\uploads\\' . $srcFileName;
    $oldFilePath = $file['tmp_name'];
    // var_dump($newFilePath);
    // var_dump($oldFilePath);
    
    $allowedExtensions = ['jpg', 'png', 'gif', 'txt'];
    $extension = pathinfo($srcFileName, PATHINFO_EXTENSION);
    var_dump($extension);

    $fileSize = ($_FILES['attachment']['size']);
    $fileNotice = 'Размер файла ' . $srcFileName . ': ' . $fileSize . ' байтов' . '<br>';

    if($file['error'] === UPLOAD_ERR_OK){
        // list($width, $height, $type, $attr) = getimagesize($srcFileName);
        // list - присваивает переменным из списка значения из массива
        // или
        $fileWeignt = getimagesize($oldFilePath);
        $width = $fileWeignt[0];
        $height = $fileWeignt[1];
    }

    var_dump($width);
    var_dump($height);  
    // var_dump($fileWeignt);

    if($width >= 1280 && $height>= 720){
        $error = 'Размер изображения превышает допустимые высоту и ширину!';
    }elseif(!$_FILES['attachment']['error'] === 0){
        $error = 'Ошибка загрузки файлов на сервере!';
    }elseif($fileSize >= 200000){
        $error = 'Загрузка файлов размером больше 20 Kb запрещена!';
    }elseif(!in_array($extension, $allowedExtensions)) {
        $error = 'Загрузка файлов с таким расширением запрещена!';
    }elseif($file['error'] !== UPLOAD_ERR_OK){
        // Значение: 0; Ошибок не возникло, файл был успешно загружен на сервер. 
        $error = 'Ошибка при загрузке файла';
    }elseif(file_exists($newFilePath)){
        $error = 'Файл с таким именем уже существует';
    }elseif(!move_uploaded_file($file['tmp_name'], $newFilePath)) {
        // move_uploaded_file - функция переместит файл из временной папки в нужную нам папку
        $error = 'Ошибка при загрузке файла';
    }else {
        $result = 'http://test/uploads/' . $srcFileName;
    }
   
}

?>

<html>
<head>
    <title>Загрузка файла</title>
</head>
<body>
    <?php if($login === null) : ?>
        <a href="/login.php">Авторизируйтесь</a>
    <?php else : ?>
        Добро пожаловать,  <?= $login; ?> | 
        <a href="/logout.php">Выйти</a>
        <br>
        <a href="/index.php">Вернуться на главную страницу</a><br><br>

            <?php if(!empty($error)): ?>
                <div style="color: red; font-weight: 700;"><?= $error ?>!!!</div>
            <?php elseif(!empty($result)): ?>   
                <p>
                    Файл <?= $srcFileName ?> успешно загружен на сайт и находиться по адресу: <br>
                    <?= $result ?>
                </p>
            <?php endif; ?>
            <?= $fileNotice; ?>
    
    <h3>Выберите фото для загрузки</h3>
    <form action="/upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="attachment">
        <input type="submit">
    </form>
    <?php endif; ?>
</body>
</html>