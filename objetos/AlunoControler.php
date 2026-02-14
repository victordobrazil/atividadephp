<?php
include_once "config/database.php";
include_once "aluno.php";


class AlunoControler{

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
    public function pesquisaAluno(){
        $sql = "SELECT * FROM RA";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);

    }
}