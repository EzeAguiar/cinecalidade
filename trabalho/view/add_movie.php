<?php
include '../model/db_connect.php';  // Verifique se o caminho está correto

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $ano = $_POST['ano'];
    $classificacao = $_POST['classificacao'];
    $genero = $_POST['genero'];
    $critica = $_POST['critica'];

    // Processamento da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem = $_FILES['imagem'];
        $diretorioDestino = '../uploads/';

        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino, 0777, true);
        }

        $nomeImagem = uniqid() . '-' . basename($imagem['name']);
        $caminhoImagem = $diretorioDestino . $nomeImagem;

        if (move_uploaded_file($imagem['tmp_name'], $caminhoImagem)) {
            // Inserir dados no banco de dados
            $sql = "INSERT INTO filmes (titulo, imagem, ano, classificacao, genero, critica) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssisss', $titulo, $caminhoImagem, $ano, $classificacao, $genero, $critica);

            if ($stmt->execute()) {
                header("Location: ../index.php");  // Redireciona após o cadastro
                exit();
            } else {
                echo "Erro ao cadastrar o filme: " . $conn->error;
            }

            $stmt->close();  // Fecha a consulta preparada
        } else {
            echo "Erro ao fazer upload da imagem.";
        }
    } else {
        echo "Nenhuma imagem foi enviada.";
    }

    $conn->close();  // Fecha a conexão com o banco de dados
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Filme</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Adicionar Filme</h1>

    <a href="../index.php"><button class="btn btn-back">Voltar para a página inicial</button></a>

    <form action="add_movie.php" method="POST" enctype="multipart/form-data">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="imagem">Upload da Imagem do Filme:</label><br>
        <input type="file" id="imagem" name="imagem" accept="image/*" required><br><br>

        <label for="ano">Ano de Lançamento:</label><br>
        <input type="number" id="ano" name="ano" min="1900" max="2100" required><br><br>

        <label for="classificacao">Classificação:</label><br>
        <input type="text" id="classificacao" name="classificacao" required><br><br>

        <label for="genero">Gênero:</label><br>
        <select id="genero" name="genero" required>
            <option value="">Selecione um gênero</option>
            <option value="Ação">Ação</option>
            <option value="Aventura">Aventura</option>
            <option value="Comédia">Comédia</option>
            <option value="Drama">Drama</option>
            <option value="Fantasia">Fantasia</option>
            <option value="Ficção Científica">Ficção Científica</option>
            <option value="Romance">Romance</option>
            <option value="Suspense">Suspense</option>
            <option value="Terror">Terror</option>
            <option value="Esporte">Esporte</option>
        </select><br><br>

        <label for="critica">Crítica:</label><br>
        <textarea id="critica" name="critica" rows="5" cols="40"></textarea><br><br>

        <button type="submit">Cadastrar Filme</button>
    </form>
</body>
</html>
