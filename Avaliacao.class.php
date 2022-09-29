<?php

class Avaliacao{
    private $nota;
    private $notaapresentacao;
    private $id_avaliador;
    private $id_trabalho;


    public function __construct($nota,$notaapresentacao){
        $this->setnota($nota);
        $this->setNotaApresentacao($notaapresentacao);
    }
    public function getnota()
    {
        return $this->nota;
    } 
    public function setnota($nota)
    {
        $this->nota = $nota;
    }
    public function getnotaapresentacao()
    {
        return $this->notaapresentacao;
    } 
    public function setnotaapresentacao($notaapresentacao)
    {
        $this->notaapresentacao = $notaapresentacao;
    }
    public function getId_avaliador()
    {
        return $this->id_avaliador;
    }

    public function setId_avaliador($id_avaliador)
    {
        $this->id_avaliador = $id_avaliador;

        return $this;
    }
}

?>
