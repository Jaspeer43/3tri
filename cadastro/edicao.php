<!DOCTYPE html>

<?php 
    session_set_cookie_params(0);
    session_start();
    require_once "autoload.php";
    require_once  "conf/Conexao.php";
    $id = isset($_GET['id']) ? $_GET['id'] : "";
    $title = "Nova Edição";
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
                        <a href="inicialL.php" class="nav__link" style=" font-size:90%;">Inicial Campus</a>
                    </li>
                    <li class="nav__item">
                        <a href="edicao.php" class="nav__link active-link" style=" font-size:90%;">Nova Edição</a>
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

        <!--==================== PROJETOS ====================-->
        
        <section class="subscribe section" style="margin-top:8%;"> 
    <div class="subscribe__bg"> <div class="subscribe__container container" style="padding: 5%;"> 
                <h2 class="section__title subscribe__title"> Crie uma nova Edição<br>Preencha o campo abaixo: </h2>

    <form id="form1" class="subscribe__form">
        <input type="hidden" name="id" id="id" size="25" value="0">
        <input type="text" name="ano" id="ano" required class="subscribe__input" placeholder="Insira o ano da Edição"><br>
        <input type="hidden" name="campus_id" id="campus_id" class="subscribe__input" value= "<?php echo $id;?>"><br>
        <button name="processa2" id="processa2" value="cadastrar" type="submit" class="button">CADASTRAR</button>
    </form>
    </section>

</section>

    <section id="resposta"></section>

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

<script src="assets/js/jQuery/jquery.js"></script>

<script src="assets/js/jquery.js"></script>

</body>

</html>