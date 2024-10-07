<?php
include '../includes/header.php'; // Incluindo o cabeçalho
include 'db.php';

// Pega todas as assistências do MongoDB e converte o cursor em um array
$assistencias = iterator_to_array($collection->find());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Document</title>
</head>

<body>

    <div >
        <table class="assistencias-table">

            <thead>
                <tr>
                    <th>Nome da Assistência</th>
                    <th>Produto</th>
                    <th>Problema Reportado</th>
                    <th>Status</th>
                    <th>Data de Criação</th>
                    <th>Data de Conclusão</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($assistencias as $assistencia) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($assistencia['nome_assistencia']); ?></td>
                        <td><?php echo htmlspecialchars($assistencia['produto']); ?></td>
                        <td><?php echo htmlspecialchars($assistencia['problema_reportado']); ?></td>
                        <td><?php echo htmlspecialchars($assistencia['status']); ?></td>
                        <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($assistencia['data_criacao']))); ?></td>
                        <td><?php echo htmlspecialchars(date('d/m/Y', strtotime($assistencia['data_conclusao']))); ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $assistencia['_id']; ?>" class="action-link edit">Editar</a>
                            <a href="delete.php?id=<?php echo $assistencia['_id']; ?>" class="action-link delete"
                                onclick="return confirm('Tem certeza que deseja deletar esta assistência?');">Deletar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php include '../includes/footer.php'; // Incluindo o rodapé ?>

</body>

</html>