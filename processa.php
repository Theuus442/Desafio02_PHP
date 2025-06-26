<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tituloLivro = filter_input(INPUT_POST, "tituloLivro", FILTER_SANITIZE_SPECIAL_CHARS);
    $autorLivro = filter_input(INPUT_POST, "autorLivro", FILTER_SANITIZE_SPECIAL_CHARS);
    $anoLivro = filter_input(INPUT_POST, "anoLivro", FILTER_VALIDATE_INT);

    if ($tituloLivro && $autorLivro && $anoLivro){
        if(!isset($_SESSION['livros'])){
            $_SESSION['livros'] = [];
        }

        $_SESSION['livros'][] = [
            'tituloLivro' => $tituloLivro,
            'autorLivro' => $autorLivro,
            'anoLivro' => $anoLivro
        ];

        echo "Livro adicionado com sucesso!<br><br>";
        echo "<a href='formulario.php'>Adicionar outros livros</a><br>";
        echo "<a href='lista.php'>Ver lista de livros</a>";
    } else{
        echo "Por favor, preencha todos os campos corretamente<br>";
        echo "<a href='formulario.php'>Voltar</a>";
    }
} else{
    echo "Acesso inválido, pois só está permitido o formulário e a lista!";
}

?>