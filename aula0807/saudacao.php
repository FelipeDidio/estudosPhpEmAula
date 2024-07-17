<?php

function saudacaoPersonalizada($nome, $horaAtual) {
    
    
    if($horaAtual > 0 && $horaAtual < 12){
        $saudacao = "Bom dia";
    } elseif($horaAtual > 12 && $horaAtual <= 18) {
        $saudacao = "Boa tarde";
    }else {
        $saudacao = "Boa noite";
    }
    
    return "$saudacao $nome, agora são: $horaAtual";
}
$hora = $horaAtual = date('H:i:s');
$nome = "Felipe";
$saudar = saudacaoPersonalizada($nome, $horaAtual);
echo $saudar; 

    

?>