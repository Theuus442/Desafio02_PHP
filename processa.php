<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tituloLivro = filter_input(INPUT_POST, "nomeLivro");
    $autorLivro = filter_input(INPUT_POST, "autorLivro", FILTER_SANITIZE_SPECIAL_CHARS);
    $anoLivro = filter_input(INPUT_POST, "anoLivro", FILTER_VALIDATE_INT);

    if ($tituloLivro || $autorLivro || $anoLivro){
        if(!isset($_SESSION['livros'])){
            $_SESSION['livros'] = [];
        }

        $_SESSION['livros'][] = [
            'tituloLivro' => $tituloLivro,
            'autorLivro' => $autorLivro,
            'anoLivro' => $anoLivro
        ];

        echo "Livro adidicionado com suceso!<br><br>";
        echo "<a href='formulario.php'>Adicionar outras pessoa</a><br>";
        echo "<a href='lista.php'>Ver lista de livros";
    } else{
        echo "Por favor, preencha todos os campos corretamente";
        echo "<a href='formulario.php'>Voltar</a>";
    }
} else{
    echo "Acesso inválido, pois só está permitido o formulario e a lista!";
}

?>