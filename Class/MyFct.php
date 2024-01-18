<?php
namespace Class;

class MyFct{
    private $rendu;
    private $scan;
    private $table;
    public $path;
    private function scan($file,$variables,$base='../View/base.html.php'){
        //scan de la base
        //faut que tout les autres scan soit réalisé et que les variables soit intégrées

        $source=$variables['sources'];

        unset($variables['sources']);

        extract($variables);

        $sourcesOb=[];

        foreach($source as $key=>$value){
            if(file_exists($value)){
                ob_start();
                require_once($value);
                $sourcesOb[$key]= ob_get_clean();
            }else{
                $sourcesOb[$key]='';
            }
        }
        extract($sourcesOb);

        ob_start();
        require_once($file);
        $file= ob_get_clean();
        
        ob_start();
        require_once($base);
        return ob_get_clean();

    }
    //automatisation de la fabrication du tableau 
    function table($field,$select,$this->path){
        $nbre=count($select);
        $table = '
        <table>
            <legend>
                Tableau
            </legend>
            <thead>
                <tr>
                ';

        foreach ($field as $key) {
            $table .= "
                    <th>
                        $key
                    </th>
                    ";
        }
        $table.='
                    <th>
                        action
                    </th>
        ';
        $table .= '
                </tr>
                ';
        foreach ($select as $ligne) {
            $id=$ligne['id'];
            $table .= 
                '<tr>'
                    ;
            foreach ($ligne as $cell) {
                $table .= "
                    <td>
                        $cell
                    </td>";
                    
            }
            $table.="
                    <td>
                        <a href='&path=$this->path&action=show&id=$id'>Afficher</a>
                    </td>
                    <td>
                        <a href=''>Supprimer</a>
                    </td>
        ";

            $table .= '
                </tr>';
        }
        
        $table .= "
            </thead>
        <tbody>
        <tfoot>
            <tr>
                <td colspan='20'>
                    Nombre $nbre
                </td>
            </tr>
        </tfoot>
        ";

        return $table;
    }
    //création du rendu de la page à partir de file variable et source
    private function render($file,$variables, $sources)
    {
        // $file = "../View/" . ucfirst($this->namePage) . "/file.html.php";

        $variables['sources'] = $sources;

        // $rendu = new MyFct;
        $rendu=$this->scan($file, $variables);
        return $rendu;
    }

    /**
     * Get the value of rendu
     */ 
    public function getRendu($file,$variables,$sources)
    {   $rendu=$this->render($file,$variables,$sources);
        $this->rendu=$rendu;
        return $this->rendu;
    }

    /**
     * Get the value of table
     */ 
    function getTable($field,$select,$path)
    {
        // $this->path=$path;
        $this->table=$this->table($field,$select,$path);
        return $this->table;
    }
    /**
     * Get the value of scan
     */ 
    public function getScan($file,$variables)
    {
        $this->scan=$this->scan($file,$variables);
        return $this->scan;
    }
}