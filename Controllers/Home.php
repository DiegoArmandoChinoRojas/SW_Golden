<?php
class Home extends Controller
{
    public function __construct() {
        session_start();
        if(!empty($_SESSION['activo'])){
            header("location: ".base_url. "Usuario");
        }
        parent:: __construct();
    }
    public function index()
    {
       $this->view->mostrarView($this, "index");
    }
}

?>