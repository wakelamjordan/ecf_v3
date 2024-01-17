<?php
namespace Controller;

use Class\MyFct;
use Manager\Manager;
use PDO;
use PDOException;

class ClientController{
    private $namePage='client';
    function __construct(){
        $action='';

        extract($_GET);

        switch($action){
            case 'client':
                new ClientController;
                break;
            default:
                $this->liste();
        }

    }
    function liste(){

        //il faudra des variables qui serons récupéré dans la base de donnée pour l'acceuil titre et intro

        //rassemblement des fichiers sources à scaner

        $sources=[
            'navbar'=>'../View/navbar.html.php',
            'titre'=>'../View/titre.html.php',
            'extra'=>'../View/recherche.html.php',
            'principal'=>'../View/table.html.php'
        ];

        //---------------------------------------------

        $request=new Manager;
        $request->select($this->namePage);

        print_r($request);

        die;



/* 

        require_once('../Service/const.php');

        $message='<h1>Connexion impossible! vérifiez les paramètres.</h1>';

        $host=HOST;
        $dbname=DBNAME;
        $user=USER;
        $password=PASSWORD;

        $dsn="mysql:host=$host;dbname=$dbname;charset=utf8";

        try{
            $connexion=new PDO($dsn,$user,$password);
        }catch(PDOException $e){
            echo $message;
            die;
        } */

        //---------------------------------------------

        $variables=[
            'h1'=>$this->namePage,
        ];

        $this->render($variables,$sources);

    }
    function render($variables,$sources){
        $file="../View/".ucfirst($this->namePage)."/file.html.php";

        $variables['sources']=$sources;

        $page=new MyFct;
        $page->scan($file,$variables);
    }
}