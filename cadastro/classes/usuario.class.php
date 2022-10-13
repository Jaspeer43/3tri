<?php

    require_once "database.class.php";

    abstract class Usuario extends Database{
        private $id;
        private $nome;
        private $sobrenome;
        public function __construct($id, $nome, $sobrenome){
            $this->setId($id);
            $this->setNome($nome);
            $this->setSobrenome($sobrenome);
        }

        public function getId(){ return $this->id; }
        public function setId($id){ $this->id = $id; }

        public function getNome(){ return $this->nome; }
        public function setNome($nome){ $this->nome = $nome; }

        public function getSobrenome(){ return $this->sobrenome; }
        public function setSobrenome($sobrenome){ $this->sobrenome = $sobrenome; }

        public function __toString() {
            return  "[Usuário]<br>ID: ".$this->getId()."<br>";
        }

        public abstract function insere();
        public abstract function excluir();
        public abstract function editar();
        public abstract static function listar($buscar = 0, $procurar = "");
    }
?>