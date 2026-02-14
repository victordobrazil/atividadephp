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

    public function lerTodos(){
        $sql = "SELECT * FROM alunos where RA = :RA";
        $resultado->bindparam(":RA", $this->ra);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_OBJ);

    }

}
