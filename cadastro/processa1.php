<?php
    require_once "conf/Conexao.php";
    include_once "autoload.php";
    $id = isset($_POST['id']) ? $_POST['id'] : 0;   
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";   
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";   
    if(isset($_POST['processa1'])){
        $processa1 = $_POST['processa1'];
    } else if(isset($_GET['processa1']))
        $processa1 = $_GET['processa1'];
    else
        $processa1 = "";

    /*
        Teste para verificar se todas os valores estão sendo recebidos:    

        echo "$id, $nome, $endereco, $email, $senha, $processa1";
    */

    //chama no processa1.
    //verifica se ação do processa1 é igual a excluir.
    if ($processa1 == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        //verifica as informações dentro do processa1.
        $campus = new Campus($id, "", "", "", "");
        //exclui a linha selecionada.
        $resultado = $campus->excluir($id);
        header("location:campus.php");
    }
   
    //chama o processa1.
    //verifica se ação do processa1 é igual à salvar.
    if ($processa1 == "cadastrar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        //verifica se o ID é igual a 0, se for cria/insere novo usuário, se não edita as informações no banco.
        if ($id == 0){
            $campus = new Campus($id, $nome, $endereco, $email, $senha);
            $resultado = $campus->insere();
            header("location:index.php");
        }else {    
            $campus = new Campus($_POST['id'], $_POST['nome'], $_POST['endereco'], $_POST['email'], $_POST['senha']);
            $resultado = $campus->editar();
        }
            header("location:inicialL.php");
       
}


//Consulta os dados dentro do banco.
    function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM campus WHERE id = $id");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['nome'] = $linha['nome'];
        $dados['endereco'] = $linha['endereco'];
        $dados['email'] = $linha['email'];
        $dados['senha'] = $linha['senha'];

    }
    return $dados;
}

    include_once "autoload.php";
    if ($processa1 == "login"){
        //Login do usuário com sucesso, Login do usuário sem sucesso, Logout do usuário
        if(isset($_POST['email']) && isset($_POST['senha']) && campus::efetuarLogin($_POST['email'], $_POST['senha'])) {
            header("Location: inicialL.php");
        } else if(isset($_POST['email']) && isset($_POST['senha'])) {
            header("Location: campus.php?msg=informações incorretas");
        }
    }





?>