<?php
Class Aluno{
    public $id;
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
        $resultado->bindParam(":id", $sql);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);
    }

    public function cadastrar(){
        $sql = "insert into alunos(nome,email,telefone,login,senha,imagem) values(:nome,:email,:telefone,:login,:senha, :imagem)";
        $senha_hash = password_hash($this->senha, PASSWORD_DEFAULT);
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":nome", $this->nome,PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email,PDO::PARAM_STR);
        $stmt->bindParam(":telefone", $this->telefone,PDO::PARAM_STR);
        $stmt->bindParam(":login", $this->login,PDO::PARAM_STR);
        $stmt->bindParam(":senha", $senha_hash,PDO::PARAM_STR);
        $stmt->bindParam(":imagem", $this->img,PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }


    }
    public function excluir(){
        $sql = "DELETE FROM alunos WHERE id = :id";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function atualizar(){
        $sql = "UPDATE produtos SET nome = :nome, descricao = :descricao, quantidade = :quantidade, 
                  preco = :preco WHERE id = :id";

        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $this->email, PDO::PARAM_STR);
        $stmt->bindParam(':quantidade', $this->telefone, PDO::PARAM_STR);
        $stmt->bindParam(':preco', $this->login, PDO::PARAM_STR);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        if($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }


    public function buscaAluno($id){
        $sql = "SELECT * FROM alunos WHERE id = :id";
        $resultado = $this->bd->prepare($sql);
        $resultado->bindParam(":id", $id, PDO::PARAM_INT);
        $resultado->execute();

        return $resultado->fetch(PDO::FETCH_OBJ);
    }

}
