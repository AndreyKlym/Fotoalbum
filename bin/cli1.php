<?php
// CLI bases
// ===================

// unset($argv[0]);

// $sum = 0;

// foreach($argv as $item) {
//     $sum += $item;
// }

// echo $sum;



unset($argv[0]);

$params = [];

foreach ($argv as $argument) {
    // var_dump($argument);
    preg_match('/^-(.+)=(.+)$/', $argument, $matches);
    // preg_match - выполняет проверку на соответствие регулярному выражению - ищет в заданном тексте subject ($argument) совпадения с шаблоном pattern ('/^-(.+)=(.+)$/') и складывает в ($matches)
    if (!empty($matches)) {
        var_dump($matches[0]);
        // var_dump($matches[1]);
        // var_dump($matches[2]);
        $paramName = $matches[1];   // запись ключа
        $paramValue = $matches[2];  // запись значения

        $params[$paramName] = $paramValue;
    }
}

var_dump($params);
