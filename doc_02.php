<?php

$dir = '.';

$file1 = scandir($dir);
$file2 = scandir($dir, 1);

// var_dump($dir);
var_dump($file1);
// var_dump($file2);

?>