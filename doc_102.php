<?php

$file = fopen(__DIR__ . '/file2.txt', 'a');
// в качестве режима работы указывается 'w' (от write)
for($i = 0; $i < 10; $i++){
    fputs($file, $i . PHP_EOL);
    // функция fputs() первым аргументом указывается ресурс, а вторым — строка, которую необходимо записать в файл
    // PHP_EOL - переносит строку
}
// while(!feof($file)) {
//     echo fgets($file);
//     // feof – возвращает true, если достигнут конец файла, и false – если нет.
        // функция fgets каждый раз сдвигает курсор на следующую строку
//     echo '<br>';
// }
fclose($file);

$file = fopen(__DIR__ . '/file3.txt', 'a');
fputs($file, 'abc' . PHP_EOL);
fclose($file);

$data = file_get_contents(__DIR__ . '/file3.txt');
echo $data;


?>