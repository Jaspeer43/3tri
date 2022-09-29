<?php
require_once ('Aluno.class.php');
require_once ('Trabalho.class.php');

$trab = new Trabalho('titulo','nome','curso');


foreach ($trab->getAluno() as $alunos){
    echo "Alunos:".$aluno->getNome()."Curso: ".$aluno->getCurso()."\n";
}

print_r($trab);
?>