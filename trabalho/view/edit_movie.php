<?php
error_reporting(0);
ini_set('display_errors', 0);

include '../model/db_connect.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM filmes WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $filme = $result->fetch_assoc();

    if (!$filme) {
        echo "Filme não encontrado.";
        exit();
    }
} else {
    echo "ID do filme não especificado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Filme</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Editar Filme</h1>

    <a href="../index.php"><button class="btn btn-back">Voltar para a página inicial</button></a>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($filme['titulo'] ?? '') ?>" required><br><br>

        <p>Imagem Atual:</p>
        <img src="<?= '../uploads/' . htmlspecialchars($filme['imagem'] ?? '') ?>" alt="<?= htmlspecialchars($filme['titulo'] ?? '') ?>" width="150"><br><br>

        <label for="imagem">Atualizar Imagem:</label><br>
        <input type="file" id="imagem" name="imagem" accept="image/*"><br><br>

        <label for="ano">Ano de Lançamento:</label><br>
        <input type="number" id="ano" name="ano" value="<?= htmlspecialchars($filme['ano'] ?? '') ?>" min="1900" max="2100" required><br><br>

        <label for="classificacao">Classificação:</label><br>
        <input type="text" id="classificacao" name="classificacao" value="<?= htmlspecialchars($filme['classificacao'] ?? '') ?>" required><br><br>

        <label for="genero">Gênero:</label><br>
        <select id="genero" name="genero" required>
            <option value="">Selecione um gênero</option>
            <?php
            $generos = ["Ação", "Aventura", "Comédia", "Drama", "Fantasia", "Ficção Científica", "Romance", "Suspense", "Terror", "Esporte"];
            foreach ($generos as $genero) {
                $selected = (isset($filme) && $filme['genero'] == $genero) ? 'selected' : '';
                echo "<option value=\"$genero\" $selected>$genero</option>";
            }
            ?>
        </select><br><br>

        <label for="critica">Crítica:</label><br>
        <textarea id="critica" name="critica" rows="5" cols="40"><?= htmlspecialchars($filme['critica'] ?? '') ?></textarea><br><br>

        <button type="submit" class="btn btn-edit">Salvar Alterações</button>
    </form>
</body>
</html>

