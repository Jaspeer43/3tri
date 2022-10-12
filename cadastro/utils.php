<?php

require_once("autoload.php");
require_once("classes/edicao.class.php");
require_once("classes/campus.class.php");



//função para exibir as informações como select.
function exibir_como_select($chave,$dados, $selecao = 0){
    $str = "option value=0>Selecione</option>";
    foreach($dados as $linha){
        $str .= "<option value='".$linha[$chave[0]]."'>".$linha[$chave[1]]."</option>";
    }
    return $str;
}

//buscar as informações de tabuleiros e exibi como select.
function lista_edicao($selecao){
    $lista = Edicao::listar();
    var_dump($lista);
    return exibir_como_select(array('id','ano'),$lista, $selecao);

}



?>