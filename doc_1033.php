<?php
  
// Create the size of image or blank image.
$image = imagecreatetruecolor(500, 300);
  
// Display the width of image.
echo imagesx('Biker.png');
// echo imagesx($image);
echo '<br>';
echo imagesy($image);
  
?>