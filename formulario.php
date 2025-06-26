<?php

session_start();

$erros = $_SESSION['erros'] ?? [];
$antiga = $_SESSION['antigaSessao'] ?? [];

unset($_SESSION['erros'], $_SESSION['antigaSessao']);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações Livro</title>
</head>
<body>
    <h2>Informe os dados do livro</h2>
    <?php if ($erros):?>
    <div style="color: red;">
        <ul>
            <?php foreach ($erros as $erro): ?>
                    <li><?= htmlspecialchars($erro) ?></li>
                <?php endforeach;?>
        </ul>
    </div>
    <?php endif; ?>

    <form method="post" action="processa.php">
        Título do livro: <input type="text" name="tituloLivro" value="<?=htmlspecialchars($antiga['tituloLivro'] ?? '') ?>">
        Autor: <input type="text" name="autorLivro" value="<?=htmlspecialchars($antiga['autorLivro'] ?? '') ?>">
        Ano do livro: <input type="text" name="anoLivro" value="<?=htmlspecialchars($antiga['anoLivro'] ?? '')?>">
        <input type="submit" value="enviar">
    </form>
</body>
</html>