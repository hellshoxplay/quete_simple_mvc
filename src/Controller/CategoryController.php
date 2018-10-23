<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 09/10/18
 * Time: 11:25
 */
namespace Controller;
use Model\CategoryManager;
use Model\Category;



class CategoryController extends AbstractController
{

    public function category()

    {
        $CategoryManager=new CategoryManager($this->pdo);
        $categories=$CategoryManager-> selectAll();
        return $this->twig->render('category.html.twig',['categories'=>$categories]);

    }

    /**
     * @param $id
     */
    public function show($id)
    {
        $categoryManager= new CategoryManager($this->pdo);
        $category=$categoryManager->selectOneById($id);
        return $this->twig->render('showCategory.html.twig',['category'=>$category]);
    }


    public function add()
    {
        if (!empty($_POST)) {
            // TODO : validations des valeurs saisies dans le form
            // création d'un nouvel objet Item et hydratation avec les données du formulaire

            $category = new Category();
            $category->setTitle($_POST['title']);

            $categoryManager = new CategoryManager($this->getPdo());
            // l'objet $category hydraté est simplement envoyé en paramètre de insert()
            $categoryManager->insert($category);
            // si tout se passe bien, redirection
            header('Location: /categories');
            exit();
        }
        // le formulaire HTML est affiché (vue à créer)
        return $this->twig->render('Category/add.html.twig');
    }

    public function edit(int $id): string
    {
        if (!empty($_POST)) {
            // TODO : validations des valeurs saisies dans le form
            // création d'un nouvel objet Item et hydratation avec les données du formulaire

            $categoryManager = new CategoryManager($this->getPdo());
            $category = $categoryManager->selectOneById($id);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $category->setTitle($_POST['title']);
                $categoryManager->update($category);
            }
        }

        return $this->twig->render('Category/edit.html.twig', ['category' => $category]);
    }
    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        if (!empty($_POST)) {
            // TODO : validations des valeurs saisies dans le form
            // création d'un nouvel objet Item et hydratation avec les données du formulaire


            $categoryManager = new CategoryManager($this->getPdo());
            $categoryManager->delete($id);
            header('Location:/categories');
        }
    }
}

