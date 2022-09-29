<?php

class Avaliacao{
    private $nota;
    private $notaapresentacao;

    public function __construct($nota,$notaapresentacao){
        
    }
    public function getnota()
    {
        return $this->nota;
    } 
    public function setnota($nota)
    {
        $this->nota = $nota;

        return $this;
    }
    public function getnotaapresentacao()
    {
        return $this->notaapresentacao;
    } 
    public function setnotaapresentacao($notaapresentacao)
    {
        $this->notaapresentacao = $notaapresentacao;

        return $this;
    }
}

?>
,