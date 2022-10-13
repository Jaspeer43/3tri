<?php
    session_set_cookie_params(0);
    session_start();
    require_once "classes/trabalho.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa3.php";
    $procurar = isset($_GET["procurar"]) ? $_GET["procurar"] : ""; 
    $tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : ""; 

    $title = "Trabalhos cadastrados";

?>
<!DOCTYPE html>
<html>
<head>
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
                        <a href="orientador.php" class="nav__link" style=" font-size:90%;">Inicial Orientadpr</a>
                    </li>
                    <li class="nav__item">
                        <a href="Vtrabalho.php" class="nav__link active-link" style=" font-size:90%;">Trabalhos cadastrados</a>
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


        <div  class="subscribe__container" style=" padding:5%; margin:10%;"> 

                <center><h2 class="subscribe__title" style="">Aqui estão os trabalhos que você orienta</h2></center>  

  <br>
    <table style="width:100%;">
            <tr>
                <td  style="font-size:100%; width: 20%; background: white; padding:0.8%; "><b>Título</b></td>
                <td  style="font-size:100%; width: 20%; background: white; padding:0.8%; "><b>Curso</b></td>
                <td  style="font-size:100%; width: 20%; background: white; padding:0.8%; "><b>Estágio</b></td>
                <td  style="font-size:100%; width: 20%; background: white; padding:0.8%; "><b>Orientador</b></td>
                <td  style="font-size:100%; width: 20%; background: white; padding:0.8%; "><b>Editar</b></td>
            </tr>

<?php  
    $lista = Trabalho::listar($tipo, $procurar);
        foreach ($lista as $linha) {
    ?>
        <tr>
            <th scope="row" style="background-color: white;padding-left:0.8%;  text-align: left;"><?php echo $linha['titulo'];?></th>
            <th scope="row" style="background-color: white;padding-left:0.8%;  text-align: left;"><?php echo $linha['curso'];?></th>
            <th scope="row" style="background-color: white;padding-left:0.8%;  text-align: left;"><?php echo $linha['estagio'];?></th>
            <th scope="row" style="background-color: white;padding-left:0.8%;  text-align: left;"><?php echo $linha['nome'];?></th>

            <td style="color:dark green; background-color: #fffff0; align-text: center;"><button class="button" style="width: 100%;"><a href='editaT.php?processa3=editar&id=<?php echo $linha['id'];?>'>EDITAR</a></button></td>
        </tr>
            <?php } ?> 
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