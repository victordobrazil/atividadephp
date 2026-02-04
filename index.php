<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisão PHP</title>
</head>
<body>
<h1>Revisão PHP</h1>




<form action="formulario.php" method="post">
    <label for="">Nome</label>
    <input type="text" name="nome">
    <label for="">E-mail</label>
    <input type="text" name="email">
    <label for="">Telefone</label>
    <input type="text" name="telefone">
    <button>Cadastrar</button>

    <br>
    <br>

    <label for="curso">Cursos:</label>
    <select name="curso" id="curso">
        <option value="Técnico em Informática">Técnico em Informática</option>
        <option value="Técnico em Computação Grafica">Técnico em Computação Grafica</option>
        <option value="Técnico em Design Grafico">Técnico em Design Grafico</option>
    </select>

    <br>
    <br>
    <input type="checkbox" id="periodo1" name="periodo[]" value="manha">
    <label for="periodo1"> Manha</label><br>
    <input type="checkbox" id="periodo2" name="periodo[]" value="tarde">
    <label for="periodo2"> Tarde</label><br>
    <input type="checkbox" id="periodo3" name="periodo[]" value="noite">
    <label for="periodo3"> Noite</label><br>
    <input type="checkbox" id="periodo3" name="periodo[]" value="Sabado (manhã)">
    <label for="periodo3"> Sabado (manhã)</label><br>



</form>

</body>
</html>