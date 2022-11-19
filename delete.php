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
        // return "Файл $fileName удален <br>";
        echo "Файл $fileName удален <br>";
    }
}else{
    // return "Файл $fileName не обнаружен  <br>";
    echo "Файл $fileName не обнаружен  <br>";
}

