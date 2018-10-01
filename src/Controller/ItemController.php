<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 01/10/18
 * Time: 17:59
 */

require __DIR__ . '/../Model/ItemManager.php';

$items = selectAllItems();

require __DIR__ . '/../View/item.php';