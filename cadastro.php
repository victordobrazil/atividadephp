<?php

include_once("objetos/AlunoControler.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $controller = new AlunoControler();

    if(isset($_POST["cadastrar"])){
        $a = $controller->cadastrarAluno($_POST["aluno"]);
    }

}


?>



<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de alunos</title>
</head>
<body>

<h1>Cadastro de alunos</h1>
<a href="index.php">Voltar</a>

<form action="cadastro.php" method="post">
    <label>Nome</label>
    <input type="text" name="aluno[nome]"><br><br>
    <label>E-mail</label>
    <input type="text" name="aluno[email]"><br><br>
    <label>Telefone</label>
    <input type="text" name="aluno[telefone]"><br><br>
    <label>Login</label>
    <input type="text" name="aluno[login]"><br><br>
    <label>Senha</label>
    <input type="text" name="aluno[senha]"><br><br>

    <button name="cadastrar">Cadastrar</button>


</form>

</body>
</html>
