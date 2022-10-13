<?php
    if(session_status() === PHP_SESSION_NONE){
        session_set_cookie_params(0);
        session_start();
    }
    include_once "conf/Conexao.php";
    include_once "conf/conf.inc.php";
    include_once "padrao.class.php";

    class Campus extends Database{
        //cria as variáveis como privadas.
        private $id;
        private $nome;
        private $endereco;
        private $email;
        private $senha;


        //constrói as variáveis.
        public function __construct($id, $nome, $endereco, $email, $senha){
            $this->setId($id);
            $this->setNome($nome);
            $this->setEndereco($endereco);
            $this->setEmail($email);
            $this->setSenha($senha);

        }

        //busca e seta os valores das variáveis.
        public function getId() { return $this->id; }
        public function setId($id) { $this->id = $id; }

        public function getNome() { return $this->nome; }
        public function setNome($nome) { $this->nome = $nome; }

        public function getEndereco() { return $this->endereco; }
        public function setEndereco($endereco) { $this->endereco = $endereco; }

        public function getEmail() { return $this->email; }
        public function setEmail($email) { $this->email = $email; }
        
        public function getSenha() { return $this->senha; }
        public function setSenha($senha) { $this->senha = $senha; }

        public function __toString() {
            return  "[Campus]<br>ID:".$this->getId()."<br>".
                    "Nome: ".$this->getNome()."<br>".
                    "Endereco: ".$this->getEndereco()."<br>".
                    "Email: ".$this->getEmail()."<br>".
                    "Senha: ".$this->getSenha()."<br>";
        }

        public function insere(){
            $sql = 'INSERT INTO fetec.campus (nome, endereco, email, senha) 
            VALUES(:nome, :endereco, :email, :senha)';
            $parametros = array(":nome"=>$this->getNome(), 
                                ":endereco"=>$this->getendereco(),
                                ":email"=>$this->getEmail(),
                                ":senha"=>$this->getSenha());
            return parent::executaComando($sql,$parametros);
        }

        public function excluir(){
            $sql = 'DELETE FROM fetec.campus WHERE id = :id';
            $parametros = array(":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public function editar(){
            $sql = 'UPDATE fetec.campus 
            SET nome = :nome, endereco = :endereco, email = :email, senha = :senha
            WHERE id = :id';
            $parametros = array(":nome"=>$this->getNome(),
                                ":endereco"=>$this->getendereco(),
                                ":email"=>$this->getEmail(),
                                ":senha"=>$this->getSenha(),
                                ":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            //cria conexão e seleciona as informações do usário.
            $pdo = Conexao::getInstance();
            $consulta = "SELECT * FROM campus " ;
            if($buscar > 0)
                switch($buscar){
                    case(1): $consulta .= " WHERE id = :procurar"; break;
                    case(2): $consulta .= " WHERE nome LIKE :procurar"; "%".$procurar .="%"; break;
                    case(3): $consulta .= " WHERE endereco LIKE :procurar"; "%".$procurar .="%"; break;
                    case(4): $consulta .= " WHERE email = :procurar "; break;
                    case(5): $consulta .= " WHERE senha = :procurar "; break;
                }

            if ($buscar > 0)
                $parametros = array(':procurar'=>$procurar);
            else 
                $parametros = array();
            return parent::buscar($consulta, $parametros);
        }
        
        public static function efetuarLogin($email, $senha){
            $sql = "SELECT id, nome, endereco FROM campus WHERE email = :email AND senha = :senha";
            $parametros = array(
                ':email' => $email,
                ':senha' => $senha,
            );
            session_set_cookie_params(0);
            session_start();
            if (self::buscar($sql, $parametros)) {
                $_SESSION['id'] = self::buscar($sql, $parametros)[0]['id'];
                $_SESSION['nome'] = self::buscar($sql, $parametros)[0]['nome'];
                $_SESSION['endereco'] = self::buscar($sql, $parametros)[0]['endereco'];
                $_SESSION['email'] = self::buscar($sql, $parametros)[0]['email'];
                $_SESSION['senha'] = self::buscar($sql, $parametros)[0]['senha'];
                return true;
            } else {
                $_SESSION['id'] = "";
                $_SESSION['nome'] = "";
                $_SESSION['endereco'] = "";
                $_SESSION['nome'] = "";
                $_SESSION['endereco'] = "";
                $_SESSION['email'] = "";
                $_SESSION['senha'] = "";
                return false;
            }
        }
    
    }



                
?>