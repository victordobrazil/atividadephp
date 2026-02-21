<?php
Class Aluno{
    public $ra;
    public $nome;
    public $email;
    public $telefone;
    public $login;
    public $senha;
    public $img;
    private $bd;


    public function __construct($bd){
        $this->bd = $bd;
    }

    public function LerTodos(){
        $sql = "SELECT * FROM alunos";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);

    }
    public function PesquisaAluno($ra){
        $sql = "SELECT * FROM alunos WHERE id = :id";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(":id", $ra);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function cadastrar(){
        $sql = "insert into alunos(nome,email,telefone,login,senha) values(:nome,:email,:telefone,:login,:senha)";
        $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":nome", $this->nome,PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email,PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $this->telefone,PDO::PARAM_STR);
        $stmt->bindParam(":login", $this->login,PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senha_hash,PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

}
