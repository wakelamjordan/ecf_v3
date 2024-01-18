<?php

namespace Controller;

use Class\MyFct;
use Manager\Manager;
use PDO;
use PDOException;

class ClientController
{
    private $path = 'client';
    private $id;
    function __construct()
    {
        $action = '';

        extract($_GET);

        switch ($action) {
            case 'new':
                $this->new();
                break;
            case 'show':
                $this->show();
                break;
            default:
                $this->liste();
        }
    }
    function new()
    {
        $titreH2='Ajouter client';

        //il faudra des variables qui serons récupéré dans la base de donnée pour l'acceuil titre et intro

        //rassemblement des fichiers sources à scaner

        $sources = [
            'navbar' => '../View/navbar.html.php',
            'titre' => '../View/titre.html.php',
            'recherche' => '',
            'form'=>"../View/$this->path/form.html.php",
            'principal' => ''
        ];

        //---------------------------------------------

        $request = new Manager;

        $field = new Manager;

        $select = $request->getSelect($this->path);
        $field = $request->getField($this->path);


        $table=new MyFct;
        $table=$table->getTable($field,$select);

        $variables = [
            'h1' => $this->path,
            'h2' => $titreH2,
            'table'=>$table,
            'modifier'=>'hidden',
            'creer'=>'',
        ];
        $file = "../View/" . ucfirst($this->path) . "/file.html.php";
        $page=new MyFct;
        $rendu=$page->getRendu($file,$variables, $sources);

        echo $rendu;
        // echo $page;
    }
    function show()
    {
        $table=$this->path;
        // echo 'show';
        echo $table;
        die;
        $titreH2='Fiche client';

        //il faudra des variables qui serons récupéré dans la base de donnée pour l'acceuil titre et intro

        //rassemblement des fichiers sources à scaner

        $sources = [
            'navbar' => '../View/navbar.html.php',
            'titre' => '../View/titre.html.php',
            'recherche' => '',
            'form'=>"../View/$this->path/form.html.php",
            'principal' => ''
        ];

        //---------------------------------------------

        $request = new Manager;

        $field = new Manager;

        $select = $request->getSelect($this->path,$this->id);
        $field = $request->getField($this->path);

        die;
        $table=new MyFct;
        $table=$table->getTable($field,$select,$table);

        $variables = [
            'h1' => $this->path,
            'h2' => $titreH2,
            'table'=>$table,
            'modifier'=>'',
            'creer'=>'hidden',
        ];
        $file = "../View/" . ucfirst($this->path) . "/file.html.php";
        $page=new MyFct;
        $rendu=$page->getRendu($file,$variables, $sources);

        echo $rendu;
        // echo $page;
    }
    function liste()
    {
        $titreH2='Liste client';

        //il faudra des variables qui serons récupéré dans la base de donnée pour l'acceuil titre et intro

        //rassemblement des fichiers sources à scaner

        $sources = [
            'navbar' => '../View/navbar.html.php',
            'titre' => '../View/titre.html.php',
            'recherche' => '../View/recherche.html.php',
            'principal' => '../View/table.html.php',
            'form'=>'',
        ];

        //---------------------------------------------

        $request = new Manager;

        $field = new Manager;


        $select = $request->getSelect($this->path);
        $field = $request->getField($this->path);

        $table=$this->path;

        $table=new MyFct;
        $table=$table->getTable($field,$select,$table);

        $variables = [
            'h1' => $this->path,
            'h2' => $titreH2,
            'table'=>$table
        ];
        $file = "../View/" . ucfirst($this->path) . "/file.html.php";
        $page=new MyFct;
        $rendu=$page->getRendu($file,$variables, $sources);

        echo $rendu;
        // echo $page;
    }
}
