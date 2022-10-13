<?php

    require_once "conf/Conexao.php";
    include_once "autoload.php";

    $id = isset($_POST['id']) ? $_POST['id'] : 0;   
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : "";
    $atuacao = isset($_POST['atuacao']) ? $_POST['atuacao'] : "";   
    $edicao_id = isset($_POST['edicao_id']) ? $_POST['edicao_id'] : "";
    $avor = isset($_POST['avor']) ? $_POST['avor'] : "";
    if(empty($avor))
        $avor = isset($_GET["avor"]) ? $_GET["avor"] : "";  
    $email = isset($_POST['email']) ? $_POST['email'] : "";   
    $senha = isset($_POST['senha']) ? $_POST['senha'] : ""; 
    if(isset($_POST['processa'])){$processa = $_POST['processa'];}else if(isset($_GET['processa'])){$processa = $_GET['processa'];}else{$processa="";}


    //chama o processa.
    //verifica se ação do processa é igual à salvar.
    if($avor == "orientador"){
        if ($processa == "cadastrar"){
            //verifica se o ID é igual a 0, se for cria/insere novo usuário, se não edita as informações no banco.
            if ($id == 0){
                $orientador = new Orientador(null, $nome, $sobrenome, $atuacao, $edicao_id, $avor, $email, $senha);    
                // echo "<pre>";
                // var_dump($orientador);
                // die();
                // echo $orientador;
                $resultado = $orientador->insere();
                header("location:login.php");
            }else {    
                $orientador = new Orientador($id, $nome, $sobrenome, $atuacao, $edicao_id, $avor, $email, $senha);
                $resultado = $orientador->editar();
                header("location:orientador.php"); 
            }
        } else if ($processa == "excluir"){
            $id = isset($_GET["id"]) ? $_GET["id"] : 0;
            //verifica as informações dentro do processa.
            $orientador = new Orientador($id, "", "", "", 0, "", "", "");
            //exclui a linha selecionada.
            $resultado = $orientador->excluir($id);
            header("location:login.php");
        } else if($processa == "login"){
            //Login do usuário com sucesso, Login do usuário sem sucesso
            if(isset($_POST['email']) && isset($_POST['senha']) && Orientador::efetuarLogin($_POST['email'], $_POST['senha'])) {
                header("Location: orientador.php");
            } else if(isset($_POST['email']) && isset($_POST['senha'])) {
                header("Location: login.php?msg=informações incorretas");
            }
        }

    } else if($avor == "avaliador"){
        if ($processa == "cadastrar"){
            $id = isset($_POST['id']) ? $_POST['id'] : "";
            //verifica se o ID é igual a 0, se for cria/insere novo usuário, se não edita as informações no banco.
            if ($id == 0){
                $avaliador = new Avaliador("", $nome, $sobrenome, $atuacao, $edicao_id, $avor, $email, $senha);                  
                $resultado = $avaliador->insere();
                header("location:login.php");
            }else {    
                $avaliador = new Avaliador($id, $nome, $sobrenome, $atuacao, $edicao_id, $avor, $email, $senha);
                $resultado = $avaliador->editar();
                header("location:avaliador.php");
            } 
        }
        include_once "autoload.php";
        if ($processa == "login"){
            //Login do usuário com sucesso, Login do usuário sem sucesso
            if(isset($_POST['email']) && isset($_POST['senha']) && Avaliador::efetuarLogin($_POST['email'], $_POST['senha'])) {
                header("Location: avaliador.php");
            } else if(isset($_POST['email']) && isset($_POST['senha'])) {
                header("Location: login.php?msg=informações incorretas");
            }
        }
    }
   


//Consulta os dados dentro do banco.
    function buscarDados($id, $obj){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM $obj WHERE id = $id");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id'] = $linha['id'];
            $dados['nome'] = $linha['nome'];
            $dados['sobrenome'] = $linha['sobrenome'];
            $dados['atuacao'] = $linha['atuacao'];
            $dados["edicao_id"] = $linha["edicao_id"];
            $dados['avor'] = $linha['avor'];
            $dados['email'] = $linha['email'];
            $dados['senha'] = $linha['senha'];
        }
        return $dados;
    }







?>