<?php
/* -----------------Error */
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set("display_errors", 1);

use Controller\Controller;
// auto load class avec name class correct
spl_autoload_register(function($class){
    //constitution de la variable path à partir du name class
    $path=dirname(__DIR__).'/'.str_replace('\\','/',$class).'.php';
    //message d'érreur
    $message ="Fichier $path introuvable!";
    //print par ce qu'en terner echo ne fonctionne pas
    file_exists($path)?require_once($path): print $message;
});

new Controller;

