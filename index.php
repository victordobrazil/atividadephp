<?php

include_once "objetos/AlunoControler.php";

$controller = new AlunoControler();
$alunos = $controller->index();
global $alunos;


$a = null;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["pesquisar"])){
      $a = $controller->pesquisaAluno($_POST["pesquisar"]);

    }
}

var_dump($a);

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senac Rio Claro</title>
</head>
<body>

<h1>Senac Rio Claro</h1>
<h3>Pesquisar aluno</h3>
<form method="post" action="index.php">
    <label>RA</label>
    <input type="number" name="pesquisar">
    <button>Pesquisar</button>
</form>

<table>
    <tr>
        <td>RA</td>
        <td>Nome</td>
        <td>EMail</td>
        <td>Telefone</td>
        <td>Login</td>
    </tr>
    <?php if($alunos):?>
        <?php foreach($alunos as $aluno):?>
            <tr>
                <td><?php echo $aluno->id; ?></td>
                <td><?php echo $aluno->nome;?></td>
                <td><?php echo $aluno->email;?></td>
                <td><?php echo $aluno->telefone;?></td>
                <td><?php echo $aluno->login;?></td>
            </tr>
        <?php endforeach;?>
    <?php endif;?>



</table>
<h2>Alunos Cadastrados</h2>

<table>
    <tr>
        <td>RA</td>
        <td>Nome</td>
        <td>EMail</td>
        <td>Telefone</td>
        <td>Login</td>
    </tr>
    <?php if($alunos):?>
    <?php foreach($alunos as $aluno):?>
    <tr>
        <td><?php echo $aluno->id; ?></td>
        <td><?php echo $aluno->nome;?></td>
        <td><?php echo $aluno->email;?></td>
        <td><?php echo $aluno->telefone;?></td>
        <td><?php echo $aluno->login;?></td>
    </tr>
    <?php endforeach;?>
    <?php endif;?>



</table>


</body>
</html>