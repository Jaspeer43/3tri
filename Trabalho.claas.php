<?php
require_once('Aluno.class.php');
class Trabalho{
    private $titulo;
    private $alunos;

    public function __construct($titulo,$nome,$curso){
        $this->setTitulo($titulo);
        $this->setAluno($aluno,$curso);
    }
    public function setAluno($nome,$curso){
        $this->alunos[] = new Aluno($nome,$curso);
    }
    public function getAluno($aluno,$curso){
        return $this->Alunos;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }
}

?>