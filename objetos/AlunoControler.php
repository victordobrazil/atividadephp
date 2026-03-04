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
        }else {
            return false;
        }


    }
    public function excluirAluno($id){
        $this->aluno->id = $id;

        if($this->aluno->excluir()){
            header("location:index.php");
        }

    }
    public function atualizarAluno($dados){

        $this->aluno->id = $dados["id"];
        $this->aluno->nome=$dados["nome"];
        $this->aluno->email=$dados["email"];
        $this->aluno->senha=$dados["senha"];
        $this->aluno->telefone=$dados["telefone"];
        $this->aluno->login=$dados["login"];

        if($this->aluno->Atualizar()){
            header("location:index.php");
        }
    }

    public function localizarAluno($id){
        return $this->aluno->buscaAluno($id);
    }

}