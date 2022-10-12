<!DOCTYPE html>

    <?php
        include_once "conf/default.inc.php";
        require_once "conf/Conexao.php";
        include_once "autoload.php";
        $title = "Login | Campus";
    ?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="You can find the most beautiful and pleasant places at the best prices with special discounts, you choose the place we will guide you all the way to wait, get your place now.">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="assets/img/if.png" type="image/png">
        <head>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
            <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        </head>
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
        <link rel="stylesheet" href="assets/css/style.css"> 
        <title><?php echo $title ?></title>
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

    <section class="subscribe section" style="margin-top:8%;"> 
        <div class="subscribe__bg"> <div class="subscribe__container container" style="padding: 5%;"> 
            <h2 class="section__title subscribe__title"> Conecte a sua<br>Conta do Campus</h2>
            
            <form method="post" action="processa1.php?processa1=login" class="subscribe__form">
                <input name="email" id="email" type="text" required="true" class="subscribe__input" placeholder="Insira seu email">
                <input name="senha" id="senha" type="password" required="true" class="subscribe__input" placeholder="Insira sua senha"> 
                <button id="login" name="login" value="login" type="submit" class="button">CONECTAR</button>
            </form>
            <br>
            <center>
                <p class="clique">Não possui cadastro?<a href="campus.php"> Clique aqui</a></p>
            </center>
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

