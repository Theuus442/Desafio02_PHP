<?php
session_start();
require_once("funcoes.php");

if (isset($_SESSION['livros']) && count($_SESSION['livros']) > 0){
    echo "<h2>Lista de Livros</h2>";
    echo"<ul>";
    foreach($_SESSION['livros'] as $livro){
        $status = verificaAntigoOuAtual($livro['anoLivro']);
        echo "<li>{$livro['tituloLivro']} - {$livro['autorLivro']} - {$livro['anoLivro']} - O livro '{$livro['tituloLivro']}' é $status.</li>";
    } echo "</ul>";
} else{
    echo "Nenhum livro cadastrado!";
} echo "<br><a href='formulario.php'>Voltar ao formulário</a>";

?>