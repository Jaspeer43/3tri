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
        private $edicao_id;
        private $avor;
        private $email;
        private $senha;


        //constrói as variáveis.
        public function __construct($id, $nome, $sobrenome, $atuacao, $edicao_id, $avor, $email, $senha){
            parent::__construct($id, $nome, $sobrenome);
            $this->setAtuacao($atuacao);
            $this->setEdicao($edicao_id);
            $this->setAvor($avor);
            $this->setEmail($email);
            $this->setSenha($senha);
        }

        //busca e seta os valores das variáveis.

        public function getAtuacao() { return $this->atuacao; }
        public function setAtuacao($atuacao) { $this->atuacao = $atuacao; }

        public function getEdicao() { return $this->edicao_id; }
        public function setEdicao($edicao_id) { $this->edicao_id = $edicao_id; }

        public function getAvor() { return $this->avor; }
        public function setAvor($avor) { $this->avor = $avor; }

        public function getEmail() { return $this->email; }
        public function setEmail($email) { $this->email = $email; }
        
        public function getSenha() { return $this->senha; }
        public function setSenha($senha) { $this->senha = $senha; }

        public function __toString() {
            return  "[Orientador]<br>ID do Orientador: ".$this->getId()."<br>".
                    "Nome do Orientador: ".$this->getNome()."<br>".
                    "Sobrenome do Orientador: ".$this->getSobrenome()."<br>".
                    "Atuação: ".$this->getAtuacao()."<br>".
                    "Edição: ".$this->getEdicao()."<br>".
                    "Avaliador ou Orientador: ".$this->getAvor()."<br>".
                    "Email: ".$this->getEmail()."<br>".
                    "Senha: ".$this->getSenha()."<br>";
        }

        public function insere(){
            $sql = 'INSERT INTO fetec.orientador (nome, sobrenome, atuacao, edicao_id, avor, email, senha) 
            VALUES(:nome, :sobrenome, :atuacao, :edicao_id, :avor, :email, :senha)';
            $parametros = array(":nome"=>$this->getNome(), 
                                ":sobrenome"=>$this->getSobrenome(),
                                ":atuacao"=>$this->getAtuacao(),
                                ":edicao_id"=>$this->getEdicao(),
                                ":avor"=>$this->getAvor(),
                                ":email"=>$this->getEmail(),
                                ":senha"=>$this->getSenha());
            return parent::executaComando($sql,$parametros);
        }

        public function excluir(){
            $sql = 'DELETE FROM fetec.orientador WHERE id = :id';
            $parametros = array(":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public function editar(){
            $sql = 'UPDATE fetec.orientador 
            SET nome = :nome, sobrenome = :sobrenome, atuacao = :atuacao, edicao_id = :edicao_id, avor = :avor, email = :email, senha = :senha
            WHERE id = :id';
            $parametros = array(":nome"=>$this->getNome(),
                                ":sobrenome"=>$this->getSobrenome(),
                                ":atuacao"=>$this->getAtuacao(),
                                ":edicao_id"=>$this->getEdicao(),
                                ":avor"=>$this->getAvor(),
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
                    case(1): $consulta .= " WHERE id = :procurar"; break;
                    case(2): $consulta .= " WHERE nome LIKE :procurar"; "%".$procurar .="%"; break;
                    case(3): $consulta .= " WHERE sobrenome LIKE :procurar"; "%".$procurar .="%"; break;
                    case(4): $consulta .= " WHERE email = :procurar "; break;
                    case(5): $consulta .= " WHERE senha = :procurar "; break;
                    case(6): $consulta .= " WHERE avor = :procurar "; break;
                }

            if ($buscar > 0)
                $parametros = array(':procurar'=>$procurar);
            else 
                $parametros = array();
            return parent::buscar($consulta, $parametros);
        }
        
        public static function efetuarLogin($email, $senha){
            $sql = "SELECT id, nome, sobrenome, atuacao, edicao_id FROM orientador WHERE email = :email AND senha = :senha";
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
                $_SESSION['edicao_id'] = self::buscar($sql, $parametros)[0]['edicao_id'];
                $_SESSION['avor'] = self::buscar($sql, $parametros)[0]['avor'];

                return true;
            } else {
                $_SESSION['id'] = "";
                $_SESSION['nome'] = "";
                $_SESSION['sobrenome'] = "";
                $_SESSION['atuacao'] = "";
                $_SESSION['foto'] = "";
                $_SESSION['edicao_id'] = "";
                $_SESSION['avor'] = "";

                return false;
            }
        }
    
    }



                
?>