<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 09/10/18
 * Time: 11:25
 */

namespace Controller;
use Model\CategoryManager;

class CategoryController
{
    public function category()

    {
        $CategoryManager=new CategoryManager();
        $categories=$CategoryManager-> selectAllCategory();
        require __DIR__ . '/../View/Category.php';

    }
    public function show($id)
    {
        $categoryManager= new CategoryManager();
        $category=$categoryManager->selectOneCategory($id);
        require __DIR__ . '/../View/showCategory.php';
    }
}

