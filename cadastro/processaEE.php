<?php
    require_once "conf/Conexao.php";
    include_once "autoload.php";

    if(isset($_POST['processaEE'])){$processaEE = $_POST['processaEE'];}else if(isset($_GET['processaEE'])){$processaEE = $_GET['processaEE'];}else{$processaEE="";}

    $id = isset($_POST["id"]) ? $_POST["id"] : 0;
    $ano = isset($_POST["ano"]) ? $_POST["ano"] : 0;
    $campus_id = isset($_POST["campus_id"]) ? $_POST["campus_id"] : 0;

    //verifica se ação do processaEE é igual a excluir.
    if ($processaEE == "excluir"){
        //verifica as informações dentro do processaEE.
        $edicao = new Edicao($id, "", "");
        //exclui a linha selecionada.
        $resultado = $edicao->excluir($id);
        header("location:edicoes.php?id=$campus_id");
    }elseif ($processaEE == "cadastrar"){
        $listar = Campus::listar(1,$campus_id);
        $camp = new Campus($campus_id, $listar[0]['nome'], $listar[0]['endereco'], $listar[0]['email'], $listar[0]['senha']);
        $edicao = new Edicao($id, $ano, $camp);
        $resultado = $edicao->editar();
        header("location:edicoes.php?id=$campus_id");
    }

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
