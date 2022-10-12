<!DOCTYPE html>
<?php 
    require_once "classes/campus.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa1.php";
    $title = "Cadastro | Campus";
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
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="description"
        content="You can find the most beautiful and pleasant places at the best prices with special discounts, you choose the place we will guide you all the way to wait, get your place now.">
    <title> <?php echo $title; ?> </title>
</head> 
<body>
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">FETEC</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="../index.html" class="nav__link">Inicial</a>
                    </li>
                    <li class="nav__item">
                        <a href="index.php" class="nav__link active-link">Campus</a>
                    </li>
                </ul>

                <div class="nav__dark">
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


    <section class="home" id="home">
            <img src="assets/img/home1.jpg" alt="" class="home__img">
    </section>



<section class="subscribe section" style="margin-top:1.5%;"> 
    <div class="subscribe__bg"> <div class="subscribe__container container" style="padding: 6%;"> 
        <h2 class="section__title subscribe__title"> Cadastre<br>seu Campus </h2>

    <!--
        No "processa1.php", a variável $processa1 só recebe o valor "cadastrar" se apertar no botão "CADASTRAR". Se apertar a tecla Enter, não recebe
    -->
    <form method="post" action="processa1.php">
        <input type="hidden" name="id" id="id" size="25" value="0">

        
        <input type="text" name="nome" id="nome" required class="subscribe__form subscribe__input" placeholder="Nome" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">
        
       
        <input type="text" name="endereco" id="endereco" required  class="subscribe__form subscribe__input" placeholder="Endereço" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">

        <input type="email" name="email" id="email"  required class="subscribe__form subscribe__input"  placeholder="Email" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">

        <input type="password" name="senha" id="senha"  required class="subscribe__form subscribe__input" placeholder="Senha" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">
        
        <br>
        <button class="button" style="float: left;"><a href="index.php">VOLTAR</a></button>
        <button name="processa1" id="processa1" value="cadastrar" type="submit" style="float: right;" class="button">CADASTRAR</button>

    </form>
                </div>
            </div>
        </section>
        <a href="#" class="scrollup" id="scroll-up" aria-label="scroll up">
            <i class='bx bx-up-arrow-alt scrollup__icon'></i>
        </a>
        <script src="assets/js/scrollreveal.min.js"></script>
        <script src="assets/js/swiper-bundle.min.js"></script>
        <script src="assets/js/main.js"></script>
</body>

</html>
    