<?php
    require_once("autoload.php");

    class Avaliador extends Usuario{
        private $atuacao;
        private $foto;
        private $email;
        private $senha;
        private $avor;

        public function __construct($id, $nome, $sobrenome, $atuacao, $foto, $email, $senha, $avor){
            parent::__construct($id, $nome, $sobrenome);
            $this->setAtuacao($atuacao);
            $this->setFoto($foto);
            $this->setEmail($email);
            $this->setSenha($senha);
            $this->setAvor($avor);
        }

        public function getAtuacao(){ return $this->atuacao; }
        public function getFoto(){ return $this->foto; }
        public function getEmail(){ return $this->email; }
        public function getSenha(){ return $this->senha; }
        public function getAvor(){ return $this->avor; }
        
        public function setAtuacao($atuacao){
            if($atuacao <> "")
                $this->atuacao = $atuacao;
            else
                throw new Exception("Por favor, insira a área de atuação.");
        }
        public function setFoto($foto){
            $this->foto = $foto; 
        }

        public function setEmail($email){
            if($email <> "")
                $this->email = $email;
            else
                throw new Exception("Por favor, insira o e-mail.");
        }
        public function setSenha($senha){
            if($senha <> "")
                $this->senha = $senha;
            else
                throw new Exception("Por favor, insira a senha.");
        }
        public function setAvor($avor){
            if($avor <> "")
                $this->avor = $avor;
            else
                throw new Exception("Por favor, insira a avor.");
        }

        public function insere(){
            $sql = "INSERT INTO avaliador (nome, sobrenome, atuacao, foto, email, senha, avor)
                    VALUES (:nome, :sobrenome, :atuacao, :foto, :email, :senha, :avor)";
            $par = array(":nome"=>$this->getNome(), ":sobrenome"=>$this->getSobrenome(), ":atuacao"=>$this->getAtuacao(), 
            ":foto"=>$this->getFoto(), ":email"=>$this->getEmail(), ":senha"=>$this->getSenha(), ":avor"=>$this->getAvor());
            return parent::executaComando($sql, $par);
        }

        public static function listar($tipo = 0, $nome = ""){
            $sql = "SELECT FROM avaliador
                    WHERE nome = :nome";
            $par = array(":nome"=>$nome);
            return parent::buscar($sql, $par);
        }

        public function editar(){
            $sql = "UPDATE professor
                    SET nomeAvaliador = :nome, sobrenomeAvaliador = :sobrenome, atuacaoAvaliador = :atuacao, 
                        emailAvaliador = :email, senhaAvaliador = :senha
                    WHERE id = :id";
            $par = array(":nome"=>$this->getNome(), ":sobrenome"=>$this->getSobrenome(), ":atuacao"=>$this->getAtuacao(),
                        ":email"=>$this->getEmail(), ":senha"=>$this->getSenha(), ":id"=>$this->getId());
            return parent::executaComando($sql, $par);
        }
        
        public function excluir(){
            $sql = "DELETE FROM avaliador WHERE id = :id";
            $par = array(":id"=>$this->getId());
            return parent::executaComando($sql, $par);
        }

        public static function efetuarLogin($email, $senha){
            $sql = "SELECT id, nome, sobrenome, atuacao, foto FROM orientador WHERE email = :email AND senha = :senha";
            $parametros = array(
                ':email' => $email,
                ':senha' => $senha,
            );
            session_set_cookie_params(0);
            session_start();
            if (self::buscar($sql, $parametros)) {
                $_SESSION['id'] = self::buscar($sql, $parametros)[0]['id'];
                $_SESSION['nome'] = self::buscar($sql, $parametros)[0]['nome'];
                $_SESSION['sobrenome'] = self::buscar($sql, $parametros)[0]['sobrenome'];
                $_SESSION['atuacao'] = self::buscar($sql, $parametros)[0]['atuacao'];
                $_SESSION['foto'] = self::buscar($sql, $parametros)[0]['foto'];
                return true;
            } else {
                $_SESSION['id'] = "";
                $_SESSION['nome'] = "";
                $_SESSION['sobrenome'] = "";
                $_SESSION['atuacao'] = "";
                $_SESSION['foto'] = "";
                return false;
            }
        }
    }
?>