<?php

namespace Sts\Controllers;

class Blog {

    public $Dados;

    public function index() {
        //echo "Controller da página blog<br>";
        $listarArtigo = new \Sts\Models\StsListarBlog();
        $this->Dados = $listarArtigo->listar();
        var_dump($this->Dados);
    }
}
