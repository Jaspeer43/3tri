<?php
 include_once "conf/Conexao.php";
 include_once "conf/conf.inc.php";
 include_once "padrao.class.php";

 class Avaliacao{

    private $notageral;
    private $notaApresentacao;
    private $avaliador_id;
    private $trabalho_id;


    public function __construct($notageral, $notaApresentacao, $avaliador_id, $trabalho_id){
        $this->setNota($notageral);
        $this->setNotaApresen($notaApresentacao);
    }
    public function getNota(){ return $this->notageral;} 
    public function setNota($notageral){ $this->notageral = $notageral;}

    public function getNotaApresen(){ return $this->notaApresentacao;} 
    public function setNotaApresen($notaApresentacao){ $this->notaApresentacao = $notaApresentacao;}
    
    public function getAvaliador_id(){return $this->avaliador_id;}
    public function setAvaliador_id($avaliador_id){$this->avaliador_id = $avaliador_id; return $this;}

    public function getTrabalho_id(){return $this->trabalho_id;}
    public function setTrabalho_id($trabalho_id){$this->trabalho_id = $trabalho_id; return $this;}

 }
?>