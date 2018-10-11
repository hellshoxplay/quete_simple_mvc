<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 09/10/18
 * Time: 11:25
 */

namespace Controller;
use Model\CategoryManager;
use Twig_Loader_Filesystem;
use Twig_Environment;
class CategoryController
{
    /**
     * @var
     */
    private $twig;

    /**
     *
     */
    public function __construct()
    {
        $loader=new Twig_Loader_Filesystem(__DIR__.'/../View');
        $this->twig=new Twig_Environment($loader);
    }

    /**
     *
     */
    public function category()

    {
        $CategoryManager=new CategoryManager();
        $categories=$CategoryManager-> selectAllCategory();
        return $this->twig->render('category.html.twig',['categories'=>$categories]);

    }

    /**
     * @param $id
     */
    public function show($id)
    {
        $categoryManager= new CategoryManager();
        $category=$categoryManager->selectOneCategory($id);
        return $this->twig->render('showCategory.html.twig',['category'=>$category]);
    }
}

