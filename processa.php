<?php

session_start();
require_once 'funcoes.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tituloLivro = filter_input(INPUT_POST, "tituloLivro", FILTER_SANITIZE_SPECIAL_CHARS);
    $autorLivro = filter_input(INPUT_POST, "autorLivro", FILTER_SANITIZE_SPECIAL_CHARS);
    $anoLivro = filter_input(INPUT_POST, "anoLivro", FILTER_VALIDATE_INT);

    $erros = [];

    validarCampoTexto($tituloLivro, 'Título do livro', $erros);
    validarCampoTexto($autorLivro, 'Autor do livro', $erros);

    if ($anoLivro === false || $anoLivro <= 0){
        $erros[] = "O ano do livro deve ser um número inteiro válido e positivo!";
    }

    if (count($erros) > 0){
        $_SESSION['erros'] = $erros; 
        $_SESSION['antigaSessao'] = $_POST;

        header('Location: formulario.php');
        exit;
    }

    if (!isset($_SESSION['livros'])){
        $_SESSION['livros'] = [];
    }

    $_SESSION['livros'][] = [
        'tituloLivro' => $tituloLivro,
        'autorLivro' => $autorLivro,
        'anoLivro' => $anoLivro
    ];

    header('Location: lista.php');
    exit;
}