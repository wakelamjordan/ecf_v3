<?php

function connexion()
{
    require_once('../Service/const.php');

    $message = '<h1>Connexion impossible! vérifiez les paramètres.</h1>';

    $host = HOST;
    $dbname = DBNAME;
    $user = USER;
    $password = PASSWORD;

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

    try {
        $connexion = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
        echo $message;
        die;
    }
}