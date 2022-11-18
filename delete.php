<?php
require __DIR__ . '/auth.php';

if(!getUserLogin())
{
    header('Location: /index.php');
}

unlink($link);
// unlink('test.html');
$file = $_FILES['attachment'];
var_dump($file);