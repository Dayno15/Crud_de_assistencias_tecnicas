<?php
include '../includes/header.php'; // Incluindo o cabeçalho
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="../css/pagina_inicial.css"> <!-- Adicionando o CSS -->
</head>
<body>
    <div class="container">
        <div class="header">
            <h3>Crud de Sistema de Assistência Técnica</h3>
        </div>
        
        <div class="relatorio">
            <h2>Relatório do Processo de Criação do CRUD de Assistências Técnicas</h2>

            <h3>1. Objetivo do Projeto:</h3>
            <p>O objetivo do projeto foi criar um sistema CRUD (Create, Read, Update, Delete) para gerenciar assistências técnicas. O sistema permite adicionar, visualizar, editar e deletar informações sobre assistências técnicas prestadas, como nome da assistência, produto, problema reportado, status, data de criação e conclusão.</p>

            <h3>2. Estrutura do Projeto:</h3>
            <p>
                - <strong>index.php:</strong> Página principal que exibe a lista de assistências técnicas cadastradas no sistema.<br>
                - <strong>create.php:</strong> Página que permite adicionar novas assistências técnicas ao sistema.<br>
                - <strong>edit.php:</strong> Página que permite editar as informações de uma assistência técnica existente.<br>
                - <strong>home.php:</strong> Cabeçalho de navegação incluído em todas as páginas.<br>
                - <strong>db.php:</strong> Arquivo responsável pela conexão com o banco de dados MongoDB.<br>
                - <strong>includes:</strong> Pasta que contém o arquivo `home.php` para o cabeçalho de navegação.<br>
                - <strong>css:</strong> Pasta onde estão armazenados os arquivos de estilo (CSS).<br>
                - <strong>vendor:</strong> Pasta gerada automaticamente pelo Composer.
            </p>

            <h3>3. Funcionalidades CRUD:</h3>
            <p>
                - <strong>Create:</strong> Permite adicionar novas assistências na página `create.php`.<br>
                - <strong>Read:</strong> Exibe todas as assistências cadastradas na página `index.php`.<br>
                - <strong>Update:</strong> A funcionalidade de edição é feita na página `edit.php`.<br>
                - <strong>Delete:</strong> Permite deletar assistências da página `index.php`.
            </p>

            <h3>4. Instalações Necessárias:</h3>
            <p>
                - <strong>XAMPP:</strong> Para criar o ambiente de desenvolvimento local.<br>
                - <strong>MongoDB:</strong> Banco de dados utilizado para armazenar as assistências.<br>
                - <strong>ext-mongodb:</strong> Extensão habilitada no `php.ini` para conectar o PHP ao MongoDB.<br>
                - <strong>Composer:</strong> Utilizado para gerenciar as dependências, instalando o pacote `mongodb` com o Composer.
            </p>

            <h3>5. Passos para Configuração:</h3>
            <p>
                1. Instalar o XAMPP.<br>
                2. Instalar o MongoDB.<br>
                3. Configurar o `php.ini` para habilitar a extensão `php_mongodb.dll`.<br>
                4. Criar os arquivos PHP para CRUD.<br>
                5. Criar e aplicar os arquivos CSS para estilização.<br>
                6. Utilizar o Composer para gerenciar as dependências necessárias do projeto.
            </p>

            <h3>6. Desafios Enfrentados:</h3>
            <p>
                - Configurar a conexão com o MongoDB corretamente foi um desafio.<br>
                - Manter o cabeçalho fixo em todas as páginas sem replicar código foi solucionado com a inclusão de `home.php` e `footer.php`.
            </p>

            <h3>Conclusão:</h3>
            <p>O sistema CRUD foi desenvolvido com sucesso utilizando PHP, MongoDB e Composer. Todas as operações essenciais de um CRUD foram implementadas e o projeto está configurado para rodar em um ambiente local utilizando XAMPP e MongoDB. O uso do Composer facilitou o gerenciamento de pacotes e a extensão do MongoDB foi bem configurada no PHP.</p>
        </div>
    </div>
</body>
</html>
<?php
include '../includes/footer.php'; 
?>
