<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 01/10/18
 * Time: 18:00
 */

?>
<!DOCTYPE html>
<html>
<head> ... </head>
<body>
<section>
    <h1>Items</h1>
    <ul>
        <?php foreach ($items as $item) : ?>
            <a href="item/<?= $item['id'] ?>"<li><?= $item['title'] ?></li></a>
        <?php endforeach ?>
    </ul>
</section>
</body>
</html>
