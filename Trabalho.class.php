<?php
require_once('Avaliacao.class.php');
class Trabalho{
    private $titulo;
    private $avaliacao;

    public function __construct($titulo,){
        $this->setTitulo($titulo);
        $this->avaliacao = array();
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
    public function addAvaliacao(Avaliacao $Avaliacao){
        $this->avaliacao[] = $Avaliacao;
    }
    public function getavaliacao(){
        return $this->avaliacao;
    }
    public function __toString(){
        return "Titulo". $this->getTitulo."<br>".
        "Nota".$this->getavaliacao()->getnota."<br>";
    }
}

?>