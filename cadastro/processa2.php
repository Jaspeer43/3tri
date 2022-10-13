<?php
    require_once "conf/Conexao.php";
    include_once "autoload.php";
    header("Content-Type: application/JSON");

    $id = isset($_POST['id']) ? $_POST['id'] : 0;   
    $ano = isset($_POST['data']) ? $_POST['data'] : "";
    $campus_id = isset($_POST['campus']) ? $_POST['campus'] : "";
    if(isset($_POST['processa2'])){$processa2 = $_POST['processa2'];}else if(isset($_GET['processa2'])){$processa2 = $_GET['processa2'];}else{$processa2="";}
    $a = array($id, $ano, $campus_id, $processa2);

  
    //chama o processa2.
    //verifica se ação do processa2 é igual à salvar.
    if ($processa2 == "cadastrar"){
         //verifica se o ID é igual a 0, se for cria/insere novo usuário, se não edita as informações no banco.
        if ($id == 0){
            $listar = Campus::listar(1,$campus_id);
            $camp = new Campus($campus_id, $listar[0]['nome'], $listar[0]['endereco'], $listar[0]['email'], $listar[0]['senha']);
            $edicao = new Edicao("", $ano, $camp);   
            $resultado = $edicao->insere();
        }
} if ($resultado){
    echo json_encode("Salvo");
}else{
    echo json_encode("Erro");
}
  
?>