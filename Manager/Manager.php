<?php
namespace Manager;
use PDO;
use PDOException;
class Manager{

    function select($table, $id = '') {
        $id = (int)$id;
        $where = '';
        $values = [];
    
        if ($id !== 0) {
            $where = " WHERE id=?";
            $values[] = $id;
        }
    
        $sql = "SELECT * FROM $table $where";
    
        $connexion = $this->connexion();
        $request = $connexion->prepare($sql);
        $request->execute($values);
        
        if ($id === 0) {
            $result = $request->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $result = $request->fetch(PDO::FETCH_ASSOC);
        }
    
        return $result; // Il manque le retour du résultat de la requête
    }
    
/*     function select($table,$id=''){

        $id=(int)$id;

        //$id!=0?$where="WHERE id=?":$where='';

        if($id!==0){
            $where="WHERE id=?";
            $values[]=$id;
        }else{
            $where='';
            $values=[];
        }

        $sql="SELECT * FROM $table $where";

        $connexion=$this->connexion();
        $request = $connexion->prepare($sql);
        $request->execute($values);
        
        if(empty($value)){
            $result=$request->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $result=$request->fetch(PDO::FETCH_ASSOC);
        }

        
    } */
    function connexion(){
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
        }
    }
}