<!DOCTYPE html>
<?php
    session_set_cookie_params(0);
    session_start();

    require_once "classes/orientador.class.php";
    require_once "classes/avaliador.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa.php";
    $title = "Login Coordenação";
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
        <title><?php echo $title; ?></title>
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
                            <a href="login.php?id=<?php echo $_SESSION["id"]; ?>" class="nav__link active-link" style=" font-size:90%;">Coordenação</a>
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

    <section class="subscribe section" style="margin-top:4%;"> 
        <div class="subscribe__bg"> <div class="subscribe__container container" style="padding: 5%;"> 
            <h2 class="section__title subscribe__title"> Conecte a sua<br>Orientador ou Avaliador</h2>
            


    <form method="post" action="processa.php?processa=login">
        <input type="hidden" name="id" id="id" size="25" value="0">
        <input type="email" name="email" id="email" required class="subscribe__form subscribe__input" placeholder="Email" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">
        <input type="password" name="senha" id="senha" required class="subscribe__form subscribe__input" placeholder="Senha" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;">
    
        <select name="avor" id="avor" required class="subscribe__form subscribe__input" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;" placeholder="Realizar login como">     
            <option name="orientador" id="orientador" class="subscribe__form subscribe__input" placeholder="Id" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;" value="orientador">Orientador</option>
            <option name="avaliador" id="avaliador" class="subscribe__form subscribe__input" placeholder="Id" style="padding-top: 1.5%; padding-bottom: 1.5%; margin-bottom: 2px; padding-left: 2%;" value="avaliador">Avaliador</option>
        </select>
        <br>
        <center><button name="login" id="login" value="login" type="submit" class="button">REALIZAR LOGIN</button></center>
    </section> 
       

        
    </form>
    </div>
</div>  
    

    <a href="#" class="scrollup" id="scroll-up" aria-label="scroll up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a>


        <script src="assets/js/scrollreveal.min.js"></script>
        <script src="assets/js/swiper-bundle.min.js"></script>
        <script src="assets/js/main.js"></script>
</body>
</html>

