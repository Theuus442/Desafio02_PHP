<?php

function verificaAntigoOuAtual($ano){
    return ($ano < 2000) ? "antigo" : "atual";
}


function validarCampoTexto($inforPreenchida, $nomeCampo, &$erros){
    if(empty(trim($inforPreenchida))){
        $erros[] = "O campo $nomeCampo é obrigatório.";
    }
}


?>