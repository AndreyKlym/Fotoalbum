<?php

$file = fopen(__DIR__ . '/doc_101.php', 'r');
// $file = fopen(__DIR__ . '/file.txt', 'r');
// for($i = 0; $i < 4; $i++){
//     echo fgets($file);
//     echo '<br>';
// }
while(!feof($file)) {
    echo fgets($file);
    // feof – возвращает true, если достигнут конец файла, и false – если нет.
        // функция fgets каждый раз сдвигает курсор на следующую строку
    echo '<br>';
}
fclose($file);


?>