<?php

require_once("autoload.php");
require_once("classes/edicao.class.php");
require_once("classes/campus.class.php");



//função para exibir as informações como select.
function exibir_como_select($chave, $dados, $selecao = 0){
    $str = 0;
    foreach($dados as $linha){
        $str .= "<option value='".$linha[$chave[0]]."'>".$linha[$chave[1]]."</option>";
    }
    return $str;
}

//buscar as informações de tabuleiros e exibi como select.
function lista_edicao($selecao){
    $lista = Edicao::listar();
    echo $lista;
    return exibir_como_select(array('id','ano'),$lista, $selecao);

}

//Consulta os dados dentro do banco.
function buscarDadosEdicao($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM edicao WHERE id = $id");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['ano'] = $linha['ano'];
        $dados['campus_id'] = $linha['campus_id'];

    }
    return $dados;
}


?>