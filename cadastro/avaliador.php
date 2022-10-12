<?php
    session_set_cookie_params(0);
    session_start();
    require_once "autoload.php";
    require_once  "conf/Conexao.php";
    require_once  "processa.php";
    $procurar = isset($_GET["procurar"]) ? $_GET["procurar"] : ""; 
    $tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : ""; 

?>
<!DOCTYPE html>
<html>
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
    <meta name="description"
        content="You can find the most beautiful and pleasant places at the best prices with special discounts, you choose the place we will guide you all the way to wait, get your place now.">

    <title>Orientador</title>

    <body>
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">FETEC</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">Inicial</a>
                    </li>
                    <li class="nav__item">
                        <a href="trabalho.php?id=<?php echo $_SESSION['id']; ?>" class="nav__link">Nova Avaliação</a>
                    </li>
                    <li class="nav__item">
                        <a href="edita.php?id=<?php echo $_SESSION['id']; ?>" class="nav__link">Editar</a>
                    </li>
                    <li class="nav__item">
                        <a href="../index.html" class="nav__link">Sair</a>
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

    <main class="main">
        <section class="home" id="home">
            <img src="assets/img/home3.jpeg" alt="" class="home__img"> 

    <section class="subscribe section" style="margin-top:8%;"> 
        <div class="subscribe__bg"> <div class="subscribe__container container" style="padding: 5%;"> 
                    <h1 class="home__data-title" style="text-shadow: black 0.1em 0.1em 0.3em;">Bem-Vindo(a)<b><br> <p> <?php echo $_SESSION['nome'];?>!</p></b></h1>
</div>
                </div>
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