<?php

    require_once "database.class.php";

    abstract class Padrao extends Database{
        private $id;
        private static $contador = 0;

        public function __construct($id) {
            $this->setId($id);
        }

        public function getId(){ return $this->id; }
        public function setId($id){ $this->id = $id; }      

        public function __toString() {
            return  "[Padrão]<br>id: ".$this->getId()."<br>";
        }

        public abstract function insere();
        public abstract function excluir();
        public abstract function editar();
        public abstract static function listar($buscar = 0, $procurar = "");
    }
?>