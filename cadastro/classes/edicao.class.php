<?php
    if(session_status() === PHP_SESSION_NONE){
        session_set_cookie_params(0);
        session_start();
    }
    include_once "conf/Conexao.php";
    include_once "conf/conf.inc.php";
    include_once "padrao.class.php";

    class Edicao extends Padrao{
        //cria as variáveis como privadas.
        private $ano;
        private $campus;


        //constrói as variáveis.
        public function __construct($id, $ano, $campus){
            parent::__construct($id);
            $this->setAno($ano);
            $this->setCampus($campus);

        }

        //busca e seta os valores das variáveis.

        public function getAno() { return $this->ano; }
        public function setAno($ano) { $this->ano = $ano; }

        public  function getCampus(){ return $this->campus; }
        public function setCampus($campus){ $this->campus = $campus; }

        public function __toString() {
            return  "[Edição]<br>ID:".$this->getId()."<br>".
                    "Ano: ".$this->getAno()."<br>".
                    "Campus: ".$this->getCampus()->getId()."<br>";
        }

        public function insere(){
            $sql = 'INSERT INTO fetec.edicao (ano, campus_id) 
            VALUES(:ano, :campus_id)';
            $parametros = array(":ano"=>$this->getAno(), 
                                ":campus_id"=>$this->getCampus()->getId());
            return parent::executaComando($sql,$parametros);
        }

        public function excluir(){
            $sql = 'DELETE FROM fetec.edicao WHERE id = :id';
            $parametros = array(":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public function editar(){
            $sql = 'UPDATE fetec.edicao 
            SET ano = :ano, campus_id = :campus_id
            WHERE id = :id';
            $parametros = array(":ano"=>$this->getAno(),
                                ":campus_id"=>$this->getCampus()->getId(),  
                                ":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            //cria conexão e seleciona as informações do usário.
            $pdo = Conexao::getInstance();
            $consulta = "SELECT * FROM edicao";
            if($buscar > 0 && $procurar <> ""){
                switch($buscar){
                    case(1): $consulta .= " WHERE edicao.id = :procurar"; break;
                    case(2): $consulta .= " WHERE ano LIKE :procurar"; "%".$procurar .="%"; break;
                    case(3): $consulta .= " WHERE campus_id = :procurar"; break;
                }
                $parametros = array(':procurar'=>$procurar);
            } else
                $parametros = array();
            return parent::buscar($consulta, $parametros);
        }
        
        public function buscarEdicao($id){
            require_once("conf/Conexao.php");

            $conexao = Conexao::getInstance();

            $query = 'SELECT * FROM edicao';
            if($id > 0){
                $query .= ' WHERE id = :id';
                $stmt->bindParam(':id', $id);
            }
                $stmt = $conexao->prepare($query);
                if($stmt->execute())
                    return $stmt->fetchAll();
        
                return false;

        }
      
        }
    
                
?>