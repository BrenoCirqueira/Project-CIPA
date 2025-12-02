<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Candidatos</title>
</head>
<body>
    <form action="" method="POST">
        <label for="nome">Nome completo: </label>
        <input type="text" name="nome_Candidato" id="nome">
        <br>
        <label for="Matricula">Matricula: </label>
        <input type="text" name="Matricula_Candidato" id="Matricula">
        <br>
        <label for="Setor">Setor: </label>
        <input type="text" name="Setor_Candidato" id="Setor">
        <br>
        <label for="Foto">Foto Do Candidato: </label>
        <input type="text" name="Foto_candidato" id="Foto">
        <br>
        <label for="Numero">Número do candidato: </label>
        <input type="text" name="Numero_candidato" id="Numero">
        <br>
        <label for="Data_registro">Data de registro da candidatura: </label>
        <input type="date" name="Data_registro" id="Data_registro">
        <br>
        <label for="Eleição">Eleição vinculada: </label>
        <input type="text" name="Eleição_vinculada" id="Eleição">
        <br>
        <label for="Cargo">Cargo pretendido na CIPA: </label>
        <select name="Cargo_pretendido" id="Cargo">
            <option value="1">eleito</option>
            <option value="2">suplente</option>
            <option value="3">participante</option>
        </select>
        <br>
        <button>Candidatar-se</button>
    </form>
    <a href="index.php?view=PaginaInicial">Voltar Pagina Inicial</a> 
</body>
</html>