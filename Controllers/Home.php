<?php
class Home extends Controller
{
    public function index()
    {
       $this->view->mostrarView($this, "index");
    }
}

?>