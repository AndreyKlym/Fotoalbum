<?php
// require __DIR__ . '/auth.php';

// if(!getUserLogin())
// {
//     header('Location: /index.php');
// }


$fileName = $_GET['name'];
// $fileName = 'Cube.png';
    // var_dump($fileName);
$filePath = 'uploads/';
$fileToDelete = $filePath.$fileName;

var_dump(file_exists($fileToDelete));

if(file_exists($fileToDelete)){
    if(unlink($fileToDelete)){
        echo "Файл $fileName удален <br>";
    }
}else{
    echo "Файл $fileName не обнаружен  <br>";
}

?>
<a href="/index.php">Вернуться на главную страницу</a><br>
