<!DOCTYPE html>
<?php 
    session_set_cookie_params(0);
    session_start();
    require_once "classes/trabalho.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa3.php";
    $title = "Cadastro | Trabalho";
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
                        <a href="orientador.php" class="nav__link">Inicial Orientador</a>
                    </li>
                    <li class="nav__item">
                        <a href="trabalho.php" class="nav__link active-link">Cadastrar Trabalho</a>
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



        
    <section class="subscribe section" style="margin-top:4%; margin-bottom: 3%;"> 
    <div class="subscribe__bg"> <div class="subscribe__container container" style="padding: 5%;"> 
    <h2 class="section__title subscribe__title"> Cadastre um<br>Novo Trabalho</h2>

    <form method="post" action="processa3.php">
        <input type="hidden" name="id" id="id" size="25" value="0">

        
        <input type="text" name="titulo" id="titulo" required class="subscribe__form subscribe__input" placeholder="Título" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">
        <input type="text" name="descricao" id="descricao" required class="subscribe__form subscribe__input" placeholder="Descrição" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">
        <input type="text" name="alunos" id="alunos" required class="subscribe__form subscribe__input" placeholder="Alunos" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">
        <input type="text" name="curso" id="curso" required class="subscribe__form subscribe__input" placeholder="Curso" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">
        <input type="text" name="estagio" id="estagio" required  class="subscribe__form subscribe__input" placeholder="Estágio" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">
        <input type="hidden" name="orientador_id" id="orientador_id" class="subscribe__input" value= "<?php echo $id;?>">

        <select name="edicao_id" class="subscribe__form subscribe__input" id="edicao_id" required class="subscribe__form subscribe__input" placeholder="Email" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">
        <?php 
                    require_once("utils.php");
                    echo lista_edicao($obj[0]['id']);
               ?>
        </select>
        
        <br>
        <button name="processa3" id="processa3" value="cadastrar" type="submit" style="float: right;" class="button">CADASTRAR</button>

    </form>
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