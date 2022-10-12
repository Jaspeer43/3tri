<?php
    require_once "conf/Conexao.php";
    include_once "autoload.php";

    $id = isset($_POST['id']) ? $_POST['id'] : 0;   
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : "";
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "";
    $alunos = isset($_POST['alunos']) ? $_POST['alunos'] : "";
    $curso = isset($_POST['curso']) ? $_POST['curso'] : "";
    $estagio = isset($_POST['estagio']) ? $_POST['estagio'] : "";
    $orientador_id = isset($_POST['orientador_id']) ? $_POST['orientador_id'] : "";
    $edicao_id = isset($_POST['edicao_id']) ? $_POST['edicao_id'] : "";

    if(isset($_POST['processa3'])){$processa3 = $_POST['processa3'];}else if(isset($_GET['processa3'])){$processa3 = $_GET['processa3'];}else{$processa3="";}

    //chama no processa3.
    //verifica se ação do processa3 é igual a excluir.
    if ($processa3 == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        //verifica as informações dentro do processa3.
        $trabalho = new Trabalho($id, "", "", "", "", "", "", "");
        //exclui a linha selecionada.
        $resultado = $trabalho->excluir($id);
        header("location:orientador.php");
    }
   
    //chama o processa3.
    //verifica se ação do processa3 é igual à salvar.
    if ($processa3 == "cadastrar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        if ($id == 0){
            $trabalho = new Trabalho($id, $titulo, $descricao, $alunos, $curso, $estagio,  $_SESSION['id'], $edicao_id);
            $resultado = $trabalho->insere();
        }else {    
        $trabalho = new Trabalho($_POST['id'], $_POST['titulo'], $_POST['descricao'], $_POST['alunos'], $_POST['curso'], $_POSTs['estagio'], $_SESSION['id'], $_POST['edicao_id']);
        $resultado = $trabalho->editar();
        }
        header("location:orientador.php");
}


//Consulta os dados dentro do banco.
    function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM edicao WHERE id = $id");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['titulo'] = $linha['titulo'];
        $dados['descricao'] = $linha['descricao'];
        $dados['alunos'] = $linha['alunos'];
        $dados['curso'] = $linha['curso'];
        $dados['estagio'] = $linha['estagio'];
        $dados['orientador_id'] = $linha['orientador_id'];
        $dados['edicao_id'] = $linha['edicao_id'];



    }
    return $dados;
}

?>