<?php
 include_once "conf/Conexao.php";
 include_once "conf/conf.inc.php";
 include_once "padrao.class.php";

 class Avaliacao{

    private $nota;
    private $notaapresentacao;
    private $avaliador_id;
    private $trabalho_id;


    public function __construct($nota, $notaapresentacao, $avaliador_id, $trabalho_id){
        $this->setNota($nota);
        $this->setNotaApresen($notaapresentacao);
    }
    public function getNota(){ return $this->nota;} 
    public function setNota($nota){ $this->nota = $nota;}

    public function getNotaApresen(){ return $this->notaapresentacao;} 
    public function setNotaApresen($notaapresentacao){ $this->notaapresentacao = $notaapresentacao;}
    
    public function getId_avaliador(){return $this->id_avaliador;}
    public function setId_avaliador($id_avaliador){$this->id_avaliador = $id_avaliador; return $this;}

 }
?>