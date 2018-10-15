<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 09/10/18
 * Time: 11:25
 */

namespace Model;


class CategoryManager extends AbstractManager
{

    // la méthode prend l'id en paramètre

    /**
     *
     */
    const TABLE = 'category';


    /**
     * CategoryManager constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        parent::__construct(self::TABLE,$pdo);
    }

    /**
     * @param Category $category
     * @return int
     */
    public function insert(Category $category): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`title`) VALUES (:title)");
        $statement->bindValue('title', $category->getTitle(), \PDO::PARAM_STR);
        if ($statement->execute()) {
            return $this->pdo->lastInsertId();
        }
    }


    /**
     * @param Item $item
     * @return int
     */
    public function update(Category $category):int
    {

        // prepared request
        $statement = $this->pdo->prepare("UPDATE $this->table SET `title` = :title WHERE id=:id");
        $statement->bindValue('id', $category->getId(), \PDO::PARAM_INT);
        $statement->bindValue('title', $category->getTitle(), \PDO::PARAM_STR);


        return $statement->execute();
    }
    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        // prepared request
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }
}

