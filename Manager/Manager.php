<?php

namespace Manager;

use PDO;
use PDOException;

class Manager
{
    private $select;
    private $field;

    function field($table)
    {    
        // $result=$this->select($table);
        $sql = "SELECT * FROM $table";

        $connexion = $this->connexion();
        $request = $connexion->prepare($sql);
        $request->execute();
        $result = $request->fetch(PDO::FETCH_ASSOC);

        $result=array_keys($result);
        return $result;
        // echo "<pre>";
        // print_r($result);
        // echo"</pre>";
        //print_r($result);
    }

    function select($table, $id='')
    {
        $id = (int)$id;
        // $where = '';
        $values = [];

        
    
        if ($id !== 0) {

            // $where = " WHERE id=?";
            $values[] = $id;

            $sql = "SELECT * FROM $table WHERE id=?";
    
            $connexion = $this->connexion();
            $request = $connexion->prepare($sql);
            $request->execute($values);
            $select = $request->fetch(PDO::FETCH_ASSOC);
        }else{
            $sql = "SELECT * FROM $table";
    
            $connexion = $this->connexion();
            $request = $connexion->prepare($sql);
            $request->execute($values);
            $select = $request->fetchAll(PDO::FETCH_ASSOC);
        }

        return $select;
        //return $resultSelect;
        //$result=array_keys($result);
        // print_r($result);
    }

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
        return $connexion;
    }
    /**
     * Get the value of select
     */ 
    public function getSelect($table)
    {
        $this->select=$this->select($table);
        return $this->select;
    }

    /**
     * Set the value of select
     *
     * @return  self
     */ 
    public function setSelect($select)
    {
        $this->select = $select;

        return $this;
    }

    /**
     * Get the value of field
     */ 
    public function getField($table)
    {
        $this->field=$this->field($table);
        return $this->field;
    }

    /**
     * Set the value of field
     *
     * @return  self
     */ 
    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }
}
