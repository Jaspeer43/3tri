<?php
require_once('Edicao.class.php');
require_once('Campus.class.php');

$rds = new Campus ('IFC','Rio do Sul');

$fetec = new Edicao(2022,$rds);

echo $fetec->getCampus()->getNome();

?>