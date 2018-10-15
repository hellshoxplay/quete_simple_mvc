<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 12/10/18
 * Time: 21:28
 */
namespace Controller;
use Twig_Loader_Filesystem;
use Twig_Environment;
use App\Connection;

abstract class AbstractController
{
    protected $twig;
    protected $pdo;

    public function __construct()
    {
        // instanciation de Twig
        $loader = new Twig_Loader_Filesystem(APP_VIEW_PATH);
        $this->twig = new Twig_Environment($loader, [
                'cache' => !APP_DEV,
                'debug' => APP_DEV,
            ]
        );
        $this->twig->addExtension(new \Twig_Extension_Debug());

        // instanciation de la connexion à la BDD
        $connection = new Connection();
        $this->pdo = $connection->getPdoConnection();
    }

    /**
     * @param Twig_Environment $twig
     */
    public function setTwig(Twig_Environment $twig): void
    {
        $this->twig = $twig;
    }

    /**
     * @return \PDO
     */
    public function getPdo(): \PDO
    {
        return $this->pdo;
    }

    /**
     * @param \PDO $pdo
     */
    public function setPdo(\PDO $pdo): void
    {
        $this->pdo = $pdo;
    }
}