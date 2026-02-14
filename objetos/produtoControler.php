<?php
include_once "config/database.php";
include_once "produtos.php";


class produtoControler{

    private $bd;
    private $aluno;

    public function __construct(){

        $banco =new Database();
        $this->bd=$banco->conectar();
        $this->aluno=new Aluno($this->bd);

    }
    public function index(){

        return $this->aluno->lerTodos();

    }
}