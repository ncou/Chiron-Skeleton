<?php
declare(strict_types = 1);

namespace Controllers;

use Psr\Container\ContainerInterface;

class AbstractController
{
    /**
     * Dependency injection container
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Set container
     *
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
        return $this;
    }

    /**
     * Load a view class
     */
    public function view($data = [])
    {
        // Create a new view and display the parsed contents
        return new \Chiron\Views\PhpRenderer(\Chiron\TEMPLATES_DIR, $data);
    }
    /**
     * Load a model class
     */
    public function model($model)
    {
        return new $model($this->app);
    }

    /**
     * Load a helper class
     */
    public function loadHelper($name)
    {
        $helper = new $name;
        return $helper;
    }

    /**
     * Require a plugin php file
     */
    // Vérifier si cette méthode est encore utilie
    public function loadPlugin($name)
    {
        // TODO : chemin à externaliser dans le fichier index.php quand on démarre l'application
        require \Chiron\APP_DIR . '/plugins/' . strtolower($name) . '.php';
    }

}
