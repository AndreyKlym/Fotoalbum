<?php

// $re = '/\/([a-zA-Z]+)\/([0-9]+)/';
$re = '/\/(?P<controler>[a-zA-Z]+)\/(?P<Id>[0-9]+)/';
$str = '/post/892';
// \'/post/890\'
// \'/post/882\'';

preg_match($re, $str, $matches);

// Print the entire match result
var_dump($matches);

// $controler = $matches[1];
$controler = $matches['controler'];
// $Id = $matches[2];
$Id = $matches['Id'];

var_dump($controler);
var_dump($Id);

echo $Id;
