<?php
session_start();


if (isset($_SESSION['livros']) && count($_SESSION['livros']) > 0){
    echo "<h2>Lista de Livros</h2>";
    echo"<ul>";
    foreach($_SESSION['livros'] as $livro){
        echo "<li>{$livro['tituloLivro']} - {$livro['autorLivro']} - {$livro['anoLivro']}</li>";
    } echo "</ul>";
} else{
    echo "Nenhum livro cadastrado!";
} echo "<br><a href='formulario.php'>voltar ao formulário</a>";

?>