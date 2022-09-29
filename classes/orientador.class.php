<?php
    if(session_status() === PHP_SESSION_NONE){
        session_set_cookie_params(0);
        session_start();
    }
    include_once "conf/Conexao.php";
    include_once "conf/conf.inc.php";
    include_once "usuario.class.php";

    class Orientador extends Usuario{
        //cria as variáveis como privadas.
        private $atuacao;
        private $foto;
        private $email;
        private $senha;
        private $avor;
        private $edicao_id;


        //constrói as variáveis.
        public function __construct($id, $nome, $sobrenome, $atuacao, $foto, $email, $senha, $edicao_id, $avor){
            parent::__construct($id, $nome, $sobrenome);
            $this->setAtuacao($atuacao);
            $this->setFoto($foto);
            $this->setEmail($email);
            $this->setSenha($senha);
            $this->setEscola($edicao_id);
            $this->setAvor($avor);
        }

        //busca e seta os valores das variáveis.

        public function getAtuacao() { return $this->atuacao; }
        public function setAtuacao($atuacao) { $this->atuacao = $atuacao; }

        public function getFoto() { return $this->foto; }
        public function setFoto($foto) { $this->foto = $foto; }

        public function getEmail() { return $this->email; }
        public function setEmail($email) { $this->email = $email; }
        
        public function getSenha() { return $this->senha; }
        public function setSenha($senha) { $this->senha = $senha; }

        public function getEscola() { return $this->edicao_id; }
        public function setEscola($edicao_id) { $this->edicao_id = $edicao_id; }

        public function getAvor() { return $this->avor; }
        public function setAvor($avor) { $this->avor = $avor; }

        public function __toString() {
            return  "[Orientador]<br>ID do Orientador: ".$this->getId()."<br>".
                    "Nome do Orientador: ".$this->getNome()."<br>".
                    "Sobrenome do Orientador: ".$this->getSobrenome()."<br>".
                    "Categoria de Ensino: ".$this->getAtuacao()."<br>".
                    "foto: ".$this->getFoto()."<br>".
                    "Email: ".$this->getEmail()."<br>".
                    "Senha: ".$this->getSenha()."<br>".
                    "Avaliador ou Orientador: ".$this->getAvor()."<br>";
        }

        public function insere(){
            $sql = 'INSERT INTO fetec.orientador (nome, sobrenome, atuacao, foto, email, senha, edicao_id, avor) 
            VALUES(:nome, :sobrenome, :atuacao, :foto, :email, :senha, :edicao_id, :avor)';
            $parametros = array(":nome"=>$this->getNome(), 
                                ":sobrenome"=>$this->getSobrenome(),
                                ":atuacao"=>$this->getAtuacao(),
                                ":foto"=>$this->getFoto(), 
                                ":email"=>$this->getEmail(),
                                ":senha"=>$this->getSenha(),
                                ":escola"=>$this->getEscola(),
                                ":avor"=>$this->getAvor());
            return parent::executaComando($sql,$parametros);
        }

        public function excluir(){
            $sql = 'DELETE FROM fetec.orientador WHERE id = :id';
            $parametros = array(":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public function editar(){
            $sql = 'UPDATE fetec.orientador 
            SET nome = :nome, sobrenome = :sobrenome, atuacao = :atuacao, foto = :foto, email = :email, senha = :senha, edicao_id = :edicao_id
            WHERE id = :id';
            $parametros = array(":nome"=>$this->getNome(),
                                ":sobrenome"=>$this->getSobrenome(),
                                ":atuacao"=>$this->getAtuacao(),
                                ":foto"=>$this->getFoto(),
                                ":email"=>$this->getEmail(),
                                ":senha"=>$this->getSenha(),
                                ":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            //cria conexão e seleciona as informações do usário.
            $pdo = Conexao::getInstance();
            $consulta = "SELECT * FROM edicao, orientador WHERE orientador.edicao_id = edicao.id AND edicao.campus_id = ".$_SESSION['id']."" ;
            if($buscar > 0)
                switch($buscar){
                    //se sobrenome da consulta for por id, mostra as informações de afotodo com aquele id.
                    case(1): $consulta .= " WHERE id = :procurar"; break;
                    //se sobrenome da consulta for por nome, mostra as informações de afotodo com aquele nome.
                    case(2): $consulta .= " WHERE nome LIKE :procurar"; "%".$procurar .="%"; break;
                    case(3): $consulta .= " WHERE sobrenome LIKE :procurar"; "%".$procurar .="%"; break;
                    //se sobrenome da consulta for por foto, mostra as informações de afotodo com aquele foto.
                    case(4): $consulta .= " WHERE foto LIKE :procurar "; $procurar = "%".$procurar."%"; break;
                    //se sobrenome da consulta for por email, mostra as informações de afotodo com aquele email.
                    case(5): $consulta .= " WHERE email = :procurar "; break;
                    case(6): $consulta .= " WHERE senha = :procurar "; break;
                    case(7): $consulta .= " WHERE avor = :procurar "; break;
                }

            if ($buscar > 0)
                $parametros = array(':procurar'=>$procurar);
            else 
                $parametros = array();
            return parent::buscar($consulta, $parametros);
        }
        
        public static function efetuarLogin($email, $senha){
            $sql = "SELECT id, nome, sobrenome, atuacao, foto, edicao_id FROM orientador WHERE email = :email AND senha = :senha";
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
                $_SESSION['edicao_id'] = self::buscar($sql, $parametros)[0]['edicao_id'];
                return true;
            } else {
                $_SESSION['id'] = "";
                $_SESSION['nome'] = "";
                $_SESSION['sobrenome'] = "";
                $_SESSION['atuacao'] = "";
                $_SESSION['foto'] = "";
                $_SESSION['edicao_id'] = "";
                return false;
            }
        }
    
    }



                
?>