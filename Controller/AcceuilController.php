<?php
namespace Controller;

use Class\MyFct;

class AcceuilController{
    private $path='acceuil';
    function __construct()
    {
        // $file="../View/".ucfirst($this->path)."/file.html.php";
        //il faudra des variables qui serons récupéré dans la base de donnée pour l'acceuil titre et intro

        //rassemblement des fichiers sources à scaner

        $sources=[
            'navbar' => '../View/navbar.html.php',
            'titre' => '../View/titre.html.php',
            'recherche' => '',
            'form'=>"../View/$this->path/form.html.php",
            'principal' => '../View/text.html.php',
        ];

        $variables=[
            'h1' => $this->path,
            'h2' => '',
            'table'=>'',
            'modifier'=>'',
            'creer'=>'hidden',
        ];

        $variables['sources']=$sources;

        $file = "../View/" . ucfirst($this->path) . "/file.html.php";
        $page=new MyFct;
        $rendu=$page->getRendu($file,$variables, $sources);

        echo $rendu;

    }
}