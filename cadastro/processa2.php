<?php
    require_once "conf/Conexao.php";
    include_once "autoload.php";

    $id = isset($_POST['id']) ? $_POST['id'] : 0;   
    $ano = isset($_POST['ano']) ? $_POST['ano'] : "";
    $campus_id = isset($_POST['campus_id']) ? $_POST['campus_id'] : "";
    if(isset($_POST['processa2'])){$processa2 = $_POST['processa2'];}else if(isset($_GET['processa2'])){$processa2 = $_GET['processa2'];}else{$processa2="";}

    //chama no processa2.
    //verifica se ação do processa2 é igual a excluir.
    if ($processa2 == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        //verifica as informações dentro do processa2.
        $edicao = new Edicao($id, "", "");
        //exclui a linha selecionada.
        $resultado = $edicao->excluir($id);
        header("location:incialL.php");
    }
   
    //chama o processa2.
    //verifica se ação do processa2 é igual à salvar.
    if ($processa2 == "cadastrar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $idCampus= isset($_POST['campus_id']) ? $_POST['campus_id'] : "";
         //verifica se o ID é igual a 0, se for cria/insere novo usuário, se não edita as informações no banco.
        if ($id == 0){
            $listar = Campus::listar(1,$idCampus);
            $camp = new Campus($idCampus, $listar[0]['nome'], $listar[0]['endereco'], $listar[0]['email'], $listar[0]['senha']);
            $edicao = new Edicao("", $_POST['ano'], $camp);   
            $resultado = $edicao->insere();
            header("location:edicao.php");
        }else { 
            $listar = Campus::listar(1,$idCampus);
            $camp = new Campus($idCampus, $listar[0]['nome'], $listar[0]['endereco'], $listar[0]['email'], $listar[0]['senha']);   
            $edicao = new Edicao($_POST['id'], $_POST['ano'], $idCampus);
            $resultado = $edicao->editar();
        }
        header("location:inicialL.php");   
}


//Consulta os dados dentro do banco.
    function buscarDados($id){
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