
<html>
<head>
    <title>Фотоальбом</title>
</head>
<body>
<?php

    $files = (scandir(__DIR__ . '/uploads'));

    $links = [];

    foreach($files as $fileName){
        if($fileName  === '.' || $fileName  === '..'){
            continue;
        }
        $links[] = 'http://test/uploads/' . $fileName;
    }

    // var_dump($files);
    var_dump($links);

    foreach($links as $link) : ?>
    <a href="<?= $link ?>">
        <img src="<?= $link ?>" alt="" height="200px">
    </a>
    <?php endforeach; ?>

    
</body>
</html>

