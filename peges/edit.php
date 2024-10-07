<?php
include '../includes/header.php'; // Incluindo o cabeçalho
include 'db.php';

// Verifica se o 'id' está definido no URL
if (!isset($_GET['id'])) {
    die('ID não fornecido.');
}

$id = $_GET['id'];

try {
    // Verifica se o 'id' é válido no formato BSON ObjectId
    $mongoId = new MongoDB\BSON\ObjectId($id);
} catch (Exception $e) {
    die('ID inválido.');
}

// Se o formulário for enviado, processa a atualização
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coleta os dados enviados pelo formulário
    $updateData = [
        'nome_assistencia' => $_POST['nome_assistencia'],
        'produto' => $_POST['produto'],
        'problema_reportado' => $_POST['problema_reportado'],
        'status' => $_POST['status'],
        'data_criacao' => $_POST['data_criacao'],
        'data_conclusao' => $_POST['data_conclusao']
    ];

    // Atualiza a assistência no banco de dados
    $collection->updateOne(
        ['_id' => $mongoId],
        ['$set' => $updateData]
    );

    // Redireciona para a página inicial após a atualização
    header('Location: index.php');
    exit();
}

// Se o formulário não for enviado, busca a assistência no banco de dados
$assistencia = $collection->findOne(['_id' => $mongoId]);

// Verifica se a assistência foi encontrada
if (!$assistencia) {
    die('Assistência não encontrada.');
}

// Verifica se as datas estão disponíveis e as formata para "YYYY-MM-DD"
$dataCriacao = isset($assistencia['data_criacao']) ? date('Y-m-d', strtotime($assistencia['data_criacao'])) : '';
$dataConclusao = isset($assistencia['data_conclusao']) ? date('Y-m-d', strtotime($assistencia['data_conclusao'])) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/edit.css">
    <title>Editar Assistência</title>
</head>
<body>
    
<h1 class="titulo">Editar Assistência Técnica</h1>

<div class="form-container">
    <form method="POST" class="edit-form">
        <label for="nome_assistencia">Nome da Assistência:</label>
        <input type="text" id="nome_assistencia" name="nome_assistencia" value="<?php echo htmlspecialchars($assistencia['nome_assistencia']); ?>" required><br>

        <label for="produto">Produto:</label>
        <input type="text" id="produto" name="produto" value="<?php echo htmlspecialchars($assistencia['produto']); ?>" required><br>

        <label for="problema_reportado">Problema Reportado:</label>
        <textarea id="problema_reportado" name="problema_reportado" required><?php echo htmlspecialchars($assistencia['problema_reportado']); ?></textarea><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" value="<?php echo htmlspecialchars($assistencia['status']); ?>" required><br>

        <label for="data_criacao">Data de Criação:</label>
        <input type="date" id="data_criacao" name="data_criacao" value="<?php echo $dataCriacao; ?>" required><br>

        <label for="data_conclusao">Data de Conclusão:</label>
        <input type="date" id="data_conclusao" name="data_conclusao" value="<?php echo $dataConclusao; ?>"><br>

        <input type="submit" value="Atualizar" class="submit-button">
    </form>
</div>

<?php include '../includes/footer.php'; // Incluindo o rodapé ?>

</body>
</html>
