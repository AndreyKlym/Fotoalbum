<?php
$re = '/Меняем автора статьи ([0-9]+) c "(.+)" на "(.+)"/';
// $re = '/Меняем автора статьи (?P<articleId>[0-9]+) c "(.+)" на "(.+)"/';
$str = 'Меняем автора статьи 123 c "Иван" на "Пётр"';

// preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
// preg_match_all($re, $str, $matches);
preg_match($re, $str, $matches);

// Print the entire match result
var_dump($matches);

$articleId = $matches[1];
$articleId = $matches['articleId'];
$oldAuthor = $matches[2];
$newAuthor = $matches[3];
$newAuthor = $matches[3];

var_dump($articleId);
// var_dump($oldAuthor);
// var_dump($newAuthor);

// echo $oldAuthor;
