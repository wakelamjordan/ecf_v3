<?php
namespace Class;

class MyFct{
    private $rendu;
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
        return ob_get_clean();
    }
    //automatisation de la fabrication du tableau 
    function Table($field,$select){
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
        $table .= '
                </tr>
                ';
        foreach ($select as $ligne) {
            $table .= 
                '<tr>'
                    ;
            foreach ($ligne as $cell) {
                $table .= "
                    <td>
                        $cell
                    </td>";
            }
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
    function render($file,$variables, $sources)
    {
        // $file = "../View/" . ucfirst($this->namePage) . "/file.html.php";

        $variables['sources'] = $sources;

        $rendu = new MyFct;
        $rendu->scan($file, $variables);
        return $rendu;
    }

    /**
     * Get the value of rendu
     */ 
    public function getRendu()
    {   $rendu=
        return $this->rendu;
    }
}