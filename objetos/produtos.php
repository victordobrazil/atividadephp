<?php

class Produto {
    public $id;
    public $nome;
    public $descricao;
    public $quantidade;
    public $preco;
    public $img;

    private $bd;

    public function __construct($bd) {
        $this->bd = $bd;
    }

    public function lerTodos() {
        $sql = "SELECT * FROM produtos ORDER BY nome ASC";
        $stmt = $this->bd->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function pesquisar($termo) {
        $like = "%" . $termo . "%";
        $sql  = "SELECT * FROM produtos WHERE nome LIKE :termo OR descricao LIKE :termo ORDER BY nome ASC";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":termo", $like, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function cadastrar() {
        $sql = "INSERT INTO produtos (nome, descricao, quantidade, preco, imagem)
                VALUES (:nome, :descricao, :quantidade, :preco, :imagem)";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":nome",       $this->nome,       PDO::PARAM_STR);
        $stmt->bindParam(":descricao",  $this->descricao,  PDO::PARAM_STR);
        $stmt->bindParam(":quantidade", $this->quantidade, PDO::PARAM_INT);
        $stmt->bindParam(":preco",      $this->preco,      PDO::PARAM_STR);
        $stmt->bindParam(":imagem",     $this->img,        PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function atualizar() {
        // ✅ CORRIGIDO: adicionado imagem = :imagem no SET
        $sql = "UPDATE produtos
                SET nome = :nome, descricao = :descricao, quantidade = :quantidade,
                    preco = :preco, imagem = :imagem
                WHERE id = :id";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":nome",       $this->nome,       PDO::PARAM_STR);
        $stmt->bindParam(":descricao",  $this->descricao,  PDO::PARAM_STR);
        $stmt->bindParam(":quantidade", $this->quantidade, PDO::PARAM_INT);
        $stmt->bindParam(":preco",      $this->preco,      PDO::PARAM_STR);
        $stmt->bindParam(":imagem",     $this->img,        PDO::PARAM_STR); // ✅ adicionado
        $stmt->bindParam(":id",         $this->id,         PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function excluir() {
        $sql  = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}