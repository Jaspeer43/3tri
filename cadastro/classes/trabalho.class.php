<?php
    include_once "conf/Conexao.php";
    include_once "conf/conf.inc.php";
    include_once "padrao.class.php";

class Trabalho extends Padrao{
    private $titulo;
    private $avaliacao;
    private $descricao;
    private $pchave;
    private $orientador_id;
    private $edicao_id;
    private $aluno = array();

    public function __construct($id, $titulo, $avaliacao, $descricao, $pchave, $orientador_id, $edicao_id, $nome, $sobrenome, $curso, $turma){
        parent::__construct($id);
        $this->setTitulo($titulo);
        $this->avaliacao = array();
        $this->setDescricao($descricao);
        $this->setPchave($pchave);
        $this->setOrientador($orientador_id);
        $this->setEdicao($edicao_id);
        // $this->setEstagio($estagio);
        $this->addAluno(0, $nome, $sobrenome, $curso, $turma, $id);
    }
 
    public function getId(){ return $this->id; }
    public function setId($id){ $this->id = $id; }
    
    public function getTitulo() { return $this->titulo;    } 
    public function setTitulo($titulo){ $this->titulo = $titulo; }
 
    public function getAvaliacao(){ return $this->avaliacao; }
    public function addAvaliacao(Avaliacao $avaliacao){ $this->avaliacao[] = $avaliacao; }
 
    public function getDescricao(){ return $this->descricao;} 
    public function setDescricao($descricao){ $this->descricao = $descricao; }

    public function getPchave(){ return $this->pchave; }
    public function setPchave($pchave){ $this->pchave = $pchave; }
    
    public function getOrientador(){ return $this->orientador_id; }
    public function setOrientador($orientador_id){ $this->orientador_id = $orientador_id; }
 
    public function getEdicao(){ return $this->edicao_id; }
    public function setEdicao($edicao_id){ $this->edicao_id = $edicao_id; }
 
    /*
    public function getEstagio(){ return $this->estagio;}
    public function setEstagio($estagio){ $this->estagio = $estagio; }
    */

    public function getAluno(){ return $this->alunos; } 
    public function addAluno($id, $nome, $sobrenome, $curso, $turma, $idTrabalho){
        $this->aluno[] = new Aluno($id, $nome, $sobrenome, $curso, $turma, $idTrabalho);
    }

    public function __toString() {
        return  "[Trabalho]<br>ID do Trabalho: ".$this->getId()."<br>".
                "Título do Trabalho: ".$this->getTitulo()."<br>".
                "Descricao do Trabalho: ".$this->getDescricao()."<br>".
                "Palavras Chaves: ".$this->getPchave()."<br>".
                "ID do Orientador: ".$this->getOrientador()."<br>".
                "ID da Edição: ".$this->getEdicao()."<br>"; 
    }

    public function insere(){
        $sql = 'INSERT INTO fetec.trabalho (titulo, descricao, pchave, orientador_id, edicao_id) 
        VALUES(:titulo, :descricao, :pchave, :pchave, :orientador_id, :edicao_id)';
        $parametros = array(":titulo"=>$this->getTitulo(), 
                            ":descricao"=>$this->getDescricao(),
                            ":pchave"=>$this->getPchave(),
                            ":orientador_id"=>$this->getOrientador(),
                            ":edicao_id"=>$this->getEdicao());
        return parent::executaComando($sql,$parametros);
    }

    public function excluir(){
        $sql = 'DELETE FROM fetec.orientador WHERE id = :id';
        $parametros = array(":id"=>$this->getId());
        return parent::executaComando($sql,$parametros);
    }

    public function editar(){
        $sql = 'UPDATE fetec.orientador 
        SET titulo = :titulo, descricao = :descricao, banner = :banner, pchave = :pchave, orientador_id = :orientador_id, aluno = :aluno
        WHERE id = :id';
        $parametros = array(":titulo"=>$this->getTitulo(),
                            ":descricao"=>$this->getDescricao(),
                            ":pchave"=>$this->getPchave(),
                            ":orientador_id"=>$this->getOrientador(),
                            ":edicao_id"=>$this->getEdicao(),
                            ":id"=>$this->getId());
        return parent::executaComando($sql,$parametros);
    }

    public static function listar($buscar = 0, $procurar = ""){
        //cria conexão e seleciona as informações do usário.
        $pdo = Conexao::getInstance();
        $consulta = "SELECT * FROM trabalho, orientador WHERE trabalho.edicao_id = ".$_SESSION['id']." AND orientador_id = orientador.id" ;
        if($buscar > 0)
            switch($buscar){
                //se avaliacao da consulta for por id, mostra as informações de abannerdo com aquele id.
                case(1): $consulta .= " WHERE id = :procurar"; break;
                //se avaliacao da consulta for por titulo, mostra as informações de abannerdo com aquele titulo.
                case(2): $consulta .= " WHERE titulo LIKE :procurar"; "%".$procurar .="%"; break;
                case(3): $consulta .= " WHERE descricao LIKE :procurar"; "%".$procurar .="%"; break;
                //se avaliacao da consulta for por pchave, mostra as informações de abannerdo com aquele pchave.
                case(4): $consulta .= " WHERE pchave = :procurar "; break;
                case(5): $consulta .= " WHERE orientador_id = :procurar "; break;
                case(6): $consulta .= " WHERE edicao_id = :procurar "; break;
            }

        if ($buscar > 0)
            $parametros = array(':procurar'=>$procurar);
        else 
            $parametros = array();
        return parent::buscar($consulta, $parametros);
    }
    
}

?>