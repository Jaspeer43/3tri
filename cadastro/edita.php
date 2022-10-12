<!DOCTYPE html>
<?php 
    session_set_cookie_params(0);
    session_start();
    require_once "classes/campus.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa.php";
    
    // $processa = isset($_POST['processa']) ? $_POST['processa'] : "";
    $processa = isset($_GET["processa"]) ? $_GET["processa"] : "";
    if ($processa == 'editar'){
        // $id = isset($_POST['id']) ? $_POST['id'] : "";
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        if ($id > 0)
            $dados = buscarDados($id);
}

    $title = "Editar - Avaliador | Orientador";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/if.png" type="image/png">
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    </head>
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <title> <?php echo $title; ?> </title>
</head> 
<body>

<header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">FETEC</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="inicialL.php" class="nav__link">Inicial Campus</a>
                    </li>
                    
                </ul>

                <div class="nav__dark">
                    <!-- Theme change button -->
                    <!-- <span class="change-theme-name">Dark mode</span> -->
                    <i class='bx bx-moon dark-theme' id="theme-button"></i>
                </div>

                <div class="nav__close" id="nav-close">
                    <i class='bx bx-x'></i>
                </div>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>
        </nav>
    </header>

    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home" id="home">
            <img src="assets/img/home3.jpeg" alt="" class="home__img">
        </section>

          
        <section class="subscribe section" style="margin-top:1%;"> 
        <div class="subscribe__bg"> <div class="subscribe__container container" style="padding: 5%;"> 
                <h2 class="section__title subscribe__title">Edite suas informações</h2>


    <!--
        No "processa.php", a variável $processa só recebe o valor "cadastrar" se apertar no botão "CADASTRAR". Se apertar a tecla Enter, não recebe
    -->
    <form method="post" action="processa.php" >
        <input type="text" readonly name="id" id="id" size="25" value="<?php if ($processa == "editar") echo $_SESSION['id']; ?>" class="subscribe__form subscribe__input" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">

        <input type="text" name="nome" id="nome" value="<?php if ($processa == "editar") echo $dados['nome']; ?>" class="subscribe__form subscribe__input" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">
        
        <input type="text" name="sobrenome" id="sobrenome" value="<?php if ($processa == "editar") echo $dados['sobrenome']; ?>" class="subscribe__form subscribe__input" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">

        <input type="text" name="atuacao" id="atuacao" value="<?php if ($processa == "editar") echo $dados['atuacao']; ?>" class="subscribe__form subscribe__input" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">

        <select name="edicao_id" id="edicao_id" class="subscribe__form subscribe__input" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%">
                    <?php 
                    require_once("utils.php");
                    echo lista_edicao($obj[0]['id']);
                    ?>
                </select>

        <select name="avor" class="subscribe__form subscribe__input" id="avor" placeholder="Selecione seu cargo" required style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">      
            <option name="orientador" class="subscribe__form subscribe__input" id="orientador" value="orientador">Orientador</option>
            <option name="avaliador" class="subscribe__form subscribe__input" id="avaliador" value="avaliador">Avaliador</option>
        </select>

        <input type="email" name="email" id="email" value="<?php if ($processa == "editar") echo $dados['email']; ?>" class="subscribe__form subscribe__input" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">

        <input type="password" name="senha" id="senha" value="<?php if ($processa == "editar") echo $dados['senha']; ?>" class="subscribe__form subscribe__input" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">
        
        <br>

        <button name="processa" id="processa" value="cadastrar" type="submit" style="float: left;" class="button">EDITAR</button>

    </form>
    <a href="processa.php?processa=excluir&id=<?php echo $_SESSION['id'];?>">EXCLUIR</a>
    </section>

</section>


<!--==================== FOOTER ====================-->


<!--========== SCROLL UP ==========-->
<a href="#" class="scrollup" id="scroll-up" aria-label="scroll up">
    <i class='bx bx-up-arrow-alt scrollup__icon'></i>
</a>

<!--=============== SCROLL REVEAL===============-->
<script src="assets/js/scrollreveal.min.js"></script>

<!--=============== SWIPER JS ===============-->
<script src="assets/js/swiper-bundle.min.js"></script>

<!--=============== MAIN JS ===============-->
<script src="assets/js/main.js"></script>
</body>

</html>