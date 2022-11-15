
<?php
list($width, $height, $type, $attr) = getimagesize("Biker.png");
// echo "<img src=\"Biker.png\" $attr alt=\"пример getimagesize()\" />";

var_dump(getimagesize("Biker.png"));

var_dump($width);
var_dump($height    );
// echo imagesx("Biker.png");

?>
