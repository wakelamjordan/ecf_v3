<?php

namespace Controller;

use Class\MyFct;
use Manager\Manager;
use PDO;
use PDOException;

class ClientController
{
    private $namePage = 'client';
    function __construct()
    {
        $action = '';

        extract($_GET);

        switch ($action) {
            case 'client':
                new ClientController;
                break;
            default:
                $this->liste();
        }
    }
    function liste()
    {

        //il faudra des variables qui serons récupéré dans la base de donnée pour l'acceuil titre et intro

        //rassemblement des fichiers sources à scaner

        $sources = [
            'navbar' => '../View/navbar.html.php',
            'titre' => '../View/titre.html.php',
            'extra' => '../View/recherche.html.php',
            'principal' => '../View/table.html.php'
        ];

        //---------------------------------------------

        $request = new Manager;

        $field = new Manager;

        $select = $request->getSelect($this->namePage);
        $field = $request->getField($this->namePage);


        $lignes=new MyFct;
        $lignes=$lignes->Table($field,$select);

        $variables = [
            'h1' => $this->namePage,
            'lignes'=>$lignes
        ];
        $file = "../View/" . ucfirst($this->namePage) . "/file.html.php";
        $page=new MyFct;
        $page->render($file,$variables, $sources);
    }
    // function render($variables, $sources)
    // {
    //     $file = "../View/" . ucfirst($this->namePage) . "/file.html.php";

    //     $variables['sources'] = $sources;

    //     $page = new MyFct;
    //     $page->scan($file, $variables);
    // }
}
