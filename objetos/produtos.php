<?php
Class Produto{
    public $id;
    public $nome;
    public $descricao;
    public $preco;
    public $quantidade;
    private $bd;

    public function __construct($bd){
        $this->bd = $bd;
    }

    public function lerTodos(){
        $sql = "SELECT * FROM produtos";
        $resultado = $this->bd->query($sql);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);

    }

}
