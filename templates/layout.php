<!DOCTYPE html>
<html>
    <head>
        <title><?php if (isset($title)) : ?><?php echo $title ?> <?php else : ?> Layout general<?php endif; ?></title>
    </head>
    <body>
        <?php echo $content ?>
    </body>
</html>