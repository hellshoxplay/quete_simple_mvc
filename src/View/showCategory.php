<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 09/10/18
 * Time: 13:29
 */
?>

<!DOCTYPE html>
<html>
<head>On veux voir la catégorie en détail ! </head>
<body>
<main>
    <h1>Item : <?= $category['categoryName'] ?></h1>
    <ul>
        <li>Id : <?= $category['idcategory'] ?></li>
    </ul>
    <a href='../categories'>Back to list</a>
</main>
</body>
</html>
