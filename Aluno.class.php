<?php

class Aluno{
    private $nome;
    private $curso;

    public function __construct($nome,$curso){
        $this->setNome($nome);
        $this->setCurso($curso);
    }
    public function getNome(){ return $this->nome;} 
    public function setNome($nome) { $this->nome = $nome;}

    public function getCurso(){return $this->curso;}
    public function setCurso($curso){$this->curso = $curso;}
}
?>