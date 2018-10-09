<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 09/10/18
 * Time: 11:25
 */

namespace Model;


class CategoryManager
{

    // la méthode prend l'id en paramètre

    public function selectAllCategory() : array
    {
        $pdo = new \PDO(DSN, USER, PASS);
        $query = "SELECT * FROM category";
        $statement = $pdo->prepare($query);
        $statement->execute();
        // contrairement à fetchAll(), fetch() ne renvoie qu'un seul résultat
        return $statement->fetchAll();
    }

    public function selectOneCategory(int $id) : array
    {
        $pdo = new \PDO(DSN, USER, PASS);
        $query = "SELECT * FROM category WHERE idcategory = :id";
        $statement = $pdo->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        // contrairement à fetchAll(), fetch() ne renvoie qu'un seul résultat
        return $statement->fetch();
    }

}
