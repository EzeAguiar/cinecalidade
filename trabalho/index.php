<?php
include './model/db_connect.php';

// Consulta para obter todos os filmes
$sql = "SELECT * FROM filmes ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="./view/style.css">
    <title>Lista de Filmes</title>
</head>
<body>
    <h1>Lista de Filmes</h1>

    <div class="movies-container">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="movie-item">
                <img src="uploads/<?= htmlspecialchars($row['imagem']) ?>" alt="<?= htmlspecialchars($row['titulo']) ?>">
                    <div class="movie-info">
                        <h2><?= $row['titulo'] ?></h2>
                        <p><strong>Ano de Lançamento:</strong> <?= $row['ano'] ?></p>
                        <p><strong>Classificação:</strong> <?= $row['classificacao'] ?></p>
                        <p><strong>Gênero:</strong> <?= $row['genero'] ?></p>
                        <p><strong>Crítica:</strong> <?= $row['critica'] ?></p>
                        <div class="buttons">
                            <a href="./view/edit_movie.php?id=<?= $row['id'] ?>">
                                <button class="btn btn-edit">Editar</button>
                            </a>
                            <a href="./model/delet_movie.php?id=<?= $row['id'] ?>">
                                <button class="btn btn-delete">Excluir</button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Nenhum filme cadastrado.</p>
        <?php endif; ?>
    </div>

    <div class="add-movie">
        <a href="./view/add_movie.php"><button class="btn btn-add">Adicionar Novo Filme</button></a>
    </div>
</body>
</html> 

