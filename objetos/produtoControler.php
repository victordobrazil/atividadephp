<?php
include_once "config/database.php";
include_once "produtos.php";


class produtoControler{

    private $bd;
    private $Produto;

    public function __construct(){

        $banco =new Database();
        $this->bd=$banco->conectar();
        $this->Produto=new Produto($this->bd);

    }
    public function index(){

        return $this->Produto->lerTodos();

    }
}