<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 01/10/18
 * Time: 17:59
 */

namespace Controller;
use Model\ItemManager;
use Model\Item;


class ItemController extends AbstractController
{
    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function index()

    {
        $itemManager=new ItemManager($this->pdo);
        $items=$itemManager-> selectAll();
        return $this->twig->render('item.html.twig',['items'=>$items]);
    }

    /**
     * @param $id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function show($id)
    {
        $itemManager= new ItemManager($this->pdo);
        $item=$itemManager->selectOneById($id);
        return $this->twig->render('showItem.html.twig',['item'=>$item]);
    }

    /**
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function add()
    {
        if (!empty($_POST)) {
            // TODO : validations des valeurs saisies dans le form
            // création d'un nouvel objet Item et hydratation avec les données du formulaire
            $item = new Item();
            $item->setTitle($_POST['title']);

            $itemManager = new ItemManager($this->getPdo());
            // l'objet $item hydraté est simplement envoyé en paramètre de insert()
            $itemManager->insert($item);
            // si tout se passe bien, redirection
            header('Location: /');
            exit();
        }
        // le formulaire HTML est affiché (vue à créer)
        return $this->twig->render('Item/add.html.twig');
    }

    /**
     * @param int $id
     * @return string
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function edit(int $id): string
    {
        $itemManager = new ItemManager($this->getPdo());
        $item = $itemManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $item->setTitle($_POST['title']);
            $itemManager->update($item);
        }

        return $this->twig->render('Item/edit.html.twig', ['item' => $item]);
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $itemManager = new ItemManager($this->getPdo());
        $itemManager->delete($id);
        header('Location:/');
    }
}

