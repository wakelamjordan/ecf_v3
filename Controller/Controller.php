<?php
namespace Controller;
class Controller{
    function __construct(){
        $path='';

        extract($_GET);

        switch($path){
            case 'client':
                new ClientController;
                break;
            default:
                new AcceuilController;
        }

    }
    
}