<?php
    session_set_cookie_params(0);
    session_start();
    require_once "classes/edicao.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa2.php";
    $procurar = isset($_GET["procurar"]) ? $_GET["procurar"] : ""; 
    $tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : ""; 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<center>
	
  <br>
    <table>
            <tr>
                <td><b>Ano</b></td>
                <td><b>Editar</b></td>
            </tr>

<?php  
    $lista = Edicao::listar($tipo, $procurar);
        foreach ($lista as $linha) {
    ?>
        <tr>
            <th scope="row"><?php echo $linha['ano'];?></th>
            <td><a href='editaE.php?processa2=editar&id=<?php echo $linha['id'];?>'>EDITAR EDIÇÃO</a></td>
        </tr>
            <?php } ?> 
        </div>
        </div>
        </div>
    </body>
    </html>