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
    public function setAvaliacao(Avaliacao $Avaliacao){
        $this->avaliacao[] = $Avaliacao;
    }
    public function getAvaliacao(){
        return $this->avaliacao;
    }
}

?>