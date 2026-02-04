<?php
$nome = filter_input(INPUT_POST,"nome",FILTER_DEFAULT);
$email = filter_input(INPUT_POST,"email",FILTER_DEFAULT);
$telefone = filter_input(INPUT_POST,"telefone",FILTER_DEFAULT);
$curso = filter_input(INPUT_POST,"curso",FILTER_DEFAULT);



if(trim($nome) === "" || $nome === null ||
    trim($email) === "" || $email === null ||
    trim($telefone) === "" || $telefone === null ||
    trim($curso) === "" || $curso === null ){
    header("Location: index.php");
    exit;
}

$nomeseguro = htmlspecialchars($nome,ENT_QUOTES,'UTF-8');
$emailS = htmlspecialchars($email,ENT_QUOTES,'UTF-8');
$telefones = htmlspecialchars($telefone,ENT_QUOTES,'UTF-8');
$cursos = htmlspecialchars($curso,ENT_QUOTES,'UTF-8');



echo "Nome: $nomeseguro <br><br>";
echo "E-mail: $emailS<br><br>";
echo "Telefone: $telefones<br><br>";
echo "Curso: $curso<br><br>";

if(isset($_POST["periodo"])){
    $periodo = implode(',' , array_filter($_POST["periodo"]));
    echo "<span> <strong> Periodo: </strong>" . $periodo . "</span> <br>";
}

