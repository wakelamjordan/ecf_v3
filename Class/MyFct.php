<?php
namespace Class;

class MyFct{
    function scan($file,$variables){
        //scan de la base
        //faut que tout les autres scan soit réalisé et que les variables soit intégrées

        $source=$variables['sources'];

        unset($variables['sources']);

        extract($variables);

        $sourcesOb=[];

        foreach($source as $key=>$value){
            ob_start();
            require_once($value);
            $sourcesOb[$key]= ob_get_clean();
        }

        extract($sourcesOb);

        ob_start();
        require_once($file);
        echo ob_get_clean();
    }
}