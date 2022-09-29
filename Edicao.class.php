<?php
require_once('Campus.class.php');

Class Edicao{
    private $ano;
    private $campus;
    
    public function __construct($ano, Campus $campus){
        $this->ano = $ano;
        $this->campus = $campus;
    
    }
    public  function getCampus(){
        return $this->campus;
    }
    public function setCampus(){
        $this->campus = $campus;
    }
    public  function getAno(){
        return $this->ano;
    }
    public function setAno(){
        $this->ano = $Ano;
    }
    public function toString(){
        return "[EDIÇÃO]<br>Ano: ".$this->getAno()."<br>".
        "<br> Campus: ".$this->getCampus()."<br>";


    }
}
?>