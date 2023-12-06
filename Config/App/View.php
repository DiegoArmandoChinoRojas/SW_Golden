<?php
class View
{
    public function mostrarView($controlador, $vista, $data="")
    {
        $controlador= get_class($controlador);
        if($controlador=="Home"){
            $vista= "View/".$vista.".php";
        }else{
            $vista="View/".$controlador."/".$vista.".php";
        }
        require $vista;
    }
}
?>