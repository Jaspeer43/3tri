<?php
    include_once "conf/Conexao.php";
    include_once "conf/conf.inc.php";
    include_once "padrao.class.php";
    include_once "usuario.class.php";

    class Aluno extends Usuario{
        private $curso;
        private $turma;
        private $idTrabalho;
        public function __construct($id, $nome, $sobrenome, $curso, $turma, $idTrabalho){
            $this->setCurso($curso);
            $this->setTurma($turma);
            $this->setIdTrabalho($idTrabalho);
        }

        public function getCurso(){ return $this->curso; }
        public function setCurso($curso){ $this->curso = $curso; }
        
        public function getTurma(){ return $this->turma; }
        public function setTurma($turma){ $this->turma = $turma; }

        public function getIdTrabalho(){ return $this->idTrabalho; }
        public function setIdTrabalho($idTrabalho){ $this->idTrabalho = $idTrabalho; }

        public function insere(){
            $sql = "INSERT INTO aluno (nome, sobrenome, curso, turma, trabalho_id)
                    VALUES(:nome, :sobrenome, :curso, :turma, :idTrabalho)";
            $par = array(":nome"=>$this->getNome(), ":sobrenome"=>$this->getSobrenome(),
                        ":curso"=>$this->getCurso(), ":turma"=>$this->getTurma(), ":idTrabalho"=>$this->getIdTrabalho());
            return parent::executaComando($sql, $par);
        }

        public function excluir(){
            $sql = "DELETE FROM aluno WHERE id = :id";
            $par = array(":id"=>$this->getId());
            return parent::executaComando($sql, $par);
        }

        public function editar(){
            $sql = "UPDATE aluno
                    SET nome = :nome, sobrenome = :sobrenome, curso = :curso, turma = :turma
                    WHERE id = :id";
            $par = array(":nome"=>$this->getNome(), ":sobrenome"=>$this->getSobrenome(),
                        ":curso"=>$this->getCurso(), ":turma"=>$this->getTurma(), ":id"=>$this->getId());
            return parent::executaComando($sql, $par);
        }

        public static function listar($buscar = 0, $procurar = ""){
            $sql = "SELECT * FROM aluno";
            if($buscar > 0 && $procurar <> ""){
                switch($buscar){
                    case(1): $sql .= " WHERE id = :procurar"; break;
                    case(2): $sql .= " WHERE nome LIKE :procurar"; $procurar = "%".$procurar."%"; break;
                    case(3): $sql .= " WHERE sobrenome LIKE :procurar"; $procurar = "%".$procurar."%"; break;
                    case(4): $sql .= " WHERE curso LIKE :procurar"; $procurar = "%".$procurar."%"; break;
                    case(5): $sql .= " WHERE turma LIKE :procurar"; $procurar = "%".$procurar."%"; break;
                }
                $par = array(":procurar"=>$procurar);
            } else
                $par = array();
            return parent::buscar($sql, $par);
        }
    }
?>