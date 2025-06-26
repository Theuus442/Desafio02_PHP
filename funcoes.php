<?php

function verificaAntigoOuAtual($ano){
    return ($ano < 2000) ? "antigo" : "atual";
}


function validarCampoTexto($inforPreenchida, $nomeCampo, &$erros){
    if(empty(trim($inforPreenchida))){
        $erros[] = "O campo $nomeCampo é obrigatório.";
        return;
    }

    if(!preg_match("/^[a-zA-ZÀ-ÿ\s]+$/u", $inforPreenchida)){
        $erros[] = "O campo $nomeCampo deve conter apenas letras e espaços.";
    }
}


?>