<?php
Class Campus{
    private $nome;
    private $endereco;
    
    public function __construct($nome,$endereco){
        $this->endereco = $endereco;
        $this->nome = $nome;
    
    }
    public  function getnome(){
        return $this->nome;
    }
    public function setnome(){
        $this->nome = $nome;
    }
    public  function getEndereco(){
        return $this->endereco;
    }
    public function setEndereco(){
        $this->endereco = $endereco;
    }

    
}
?>