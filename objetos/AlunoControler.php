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
        return $this->aluno->LerTodos();
    }
    public function pesquisaAluno($ra){
        return $this->aluno->PesquisaAluno($ra);
    }
    public function cadastrarAluno($dados){

        $this->aluno->nome=$dados["nome"];
        $this->aluno->email=$dados["email"];
        $this->aluno->senha=$dados["senha"];
        $this->aluno->endereco=$dados["endereco"];
        $this->aluno->telefone=$dados["telefone"];
        $this->aluno->login=$dados["login"];

        if($this->aluno->Cadastrar()){
            header("location:index.php");
        } else {
            return false;
        }


    }

}