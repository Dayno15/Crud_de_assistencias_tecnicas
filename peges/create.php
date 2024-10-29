<?php
include '../includes/header.php'; // Incluindo o cabeçalho
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Se a data de conclusão não for informada, define como '00/00/0000'
    $dataConclusao = empty($_POST['data_conclusao']) ? '00/00/0000' : $_POST['data_conclusao'];
    
    $data = [
        'nome_assistencia' => $_POST['nome_assistencia'],
        'produto' => $_POST['produto'],
        'problema_reportado' => $_POST['problema_reportado'],
        'status' => $_POST['status'], // Obtém o status a partir do select
        'data_criacao' => $_POST['data_criacao'],
        'data_conclusao' => $dataConclusao // Se não houver data, será '00/00/0000'
    ];

    $collection->insertOne($data);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/create.css">
    <title>Adicionar Assistência</title>
</head>
<body>
    
<h1 class="titulo">Adicionar Assistência Técnica</h1>

<form method="POST" class="form-assistencia">
    <label for="nome_assistencia">Nome da Assistência:</label>
    <input type="text" id="nome_assistencia" name="nome_assistencia" class="input-text" required><br>

    <label for="produto">Produto:</label>
    <input type="text" id="produto" name="produto" class="input-text" required><br>

    <label for="problema_reportado">Problema Reportado:</label>
    <textarea id="problema_reportado" name="problema_reportado" class="textarea" required></textarea><br>

    <label for="status">Status:</label>
    <select id="status" name="status" class="input-select" required>
        <option value="Em analise">Em análise</option>
        <option value="Concluido">Concluído</option>
    </select><br>

    <label for="data_criacao">Data de Criação:</label>
    <input type="date" id="data_criacao" name="data_criacao" class="input-date" required><br>

    <label for="data_conclusao">Data de Conclusão:</label>
    <input type="date" id="data_conclusao" name="data_conclusao" class="input-date"><br>

    <input type="submit" value="Adicionar" class="btn-submit">
</form>

<?php include '../includes/footer.php'; // Incluindo o rodapé ?>

</body>
</html>
!