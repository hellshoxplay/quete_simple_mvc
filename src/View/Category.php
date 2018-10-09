<?php

?>

<!DOCTYPE html>
<html>
<head> ... </head>
<body>
<section>
    <h1>Categories</h1>
    <ul>
        <?php foreach ($categories as $category) : ?>
            <a href="item/<?= $category['idcategory'] ?>"<li><?= $category['categoryName'] ?></a></li>
        <?php endforeach ?>
    </ul>
</section>
</body>
</html>

