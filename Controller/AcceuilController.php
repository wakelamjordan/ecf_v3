<?php
namespace Controller;

use Class\MyFct;

class AcceuilController{
    private $namePage='acceuil';
    function __construct()
    {
        $file="../View/".ucfirst($this->namePage)."/file.html.php";
        //il faudra des variables qui serons récupéré dans la base de donnée pour l'acceuil titre et intro

        //rassemblement des fichiers sources à scaner

        $sources=[
            'navbar'=>'../View/navbar.html.php',
            'titre'=>'../View/titre.html.php',
            'principal'=>'../View/text.html.php'
        ];

        $variables=[
            'h1'=>$this->namePage,
            'intro'=>'intro'
        ];

        $variables['sources']=$sources;

        $page=new MyFct;
        $page->scan($file,$variables);
    }
}