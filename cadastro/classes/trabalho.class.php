<?php
    include_once "conf/Conexao.php";
    include_once "conf/conf.inc.php";
    include_once "padrao.class.php";

class Trabalho extends Padrao{
    private $titulo;
    private $avaliacao;
    private $descricao;
    private $banner;
    private $pchave;
    // private $estagio;
    private $aluno = array();

    public function __construct($id, $titulo, $avaliacao, $descricao, $banner, $pchave /*, $estagio */, $nome, $sobrenome, $curso, $turma){
        parent::__construct($id);
        $this->setTitulo($titulo);
        $this->avaliacao = array();
        $this->setDescricao($descricao);
        $this->setBanner($banner);
        $this->setPchave($pchave);
        // $this->setEstagio($estagio);
        $this->addAluno(0, $nome, $sobrenome, $curso, $turma, $id);
    }
 
    public function getId(){ return $this->id; }
    public function setId($id){ $this->id = $id; }
    
    public function getTitulo() { return $this->titulo;    } 
    public function setTitulo($titulo){ $this->titulo = $titulo; }
 
    public function getAvaliacao(){ return $this->avaliacao; }
    public function addAvaliacao(Avaliacao $avaliacao){ $this->avaliacao[] = $Avaliacao; }
 
    public function getDescricao(){ return $this->descricao;} 
    public function setDescricao($descricao){ $this->descricao = $descricao; }
    
    public function getBanner(){ return $this->banner;} 
    public function setBanner($banner){ $this->banner = $banner; }

    public function getPchave(){ return $this->pchave; }
    public function setPchave($pchave){ $this->pchave = $pchave; }
 
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
                "titulo do Trabalho: ".$this->getTitulo()."<br>".
                "Descricao do Trabalho: ".$this->getDescricao()."<br>".
                "Autores: ".$this->getAluno()."<br>".
                "Banner: ".$this->getBanner()."<br>".
                "Avaliação: ".$this->getAvaliacao()."<br>";
    }

    public function insere(){
        $sql = 'INSERT INTO fetec.trabalho (titulo, avaliacao, descricao, banner, pchave, estagio, aluno) 
        VALUES(:titulo, :avaliacao, :descricao, :banner, :pchave, :estagio, :aluno)';
        $parametros = array(":titulo"=>$this->getTitulo(), 
                            ":avaliacao"=>$this->getAvaliacao(),
                            ":descricao"=>$this->getDescricao(),
                            ":banner"=>$this->getBanner(), 
                            ":pchave"=>$this->getPchave(),
                            ":estagio"=>$this->getEstagio(),
                            ":aluno"=>$this->getAluno());
        return parent::executaComando($sql,$parametros);
    }

    public function excluir(){
        $sql = 'DELETE FROM fetec.orientador WHERE id = :id';
        $parametros = array(":id"=>$this->getId());
        return parent::executaComando($sql,$parametros);
    }

    public function editar(){
        $sql = 'UPDATE fetec.orientador 
        SET titulo = :titulo, avaliacao = :avaliacao, descricao = :descricao, banner = :banner, pchave = :pchave, estagio = :estagio, aluno = :aluno
        WHERE id = :id';
        $parametros = array(":titulo"=>$this->getTitulo(),
                            ":avaliacao"=>$this->getSobretitulo(),
                            ":descricao"=>$this->getDescricao(),
                            ":banner"=>$this->getBanner(),
                            ":pchave"=>$this->getPchave(),
                            ":estagio"=>$this->getEstagio(),
                            ":id"=>$this->getId());
        return parent::executaComando($sql,$parametros);
    }

    public static function listar($buscar = 0, $procurar = ""){
        //cria conexão e seleciona as informações do usário.
        $pdo = Conexao::getInstance();
        $consulta = "SELECT * FROM edicao, orientador WHERE orientador.aluno = edicao.id AND edicao.campus_id = ".$_SESSION['id']."" ;
        if($buscar > 0)
            switch($buscar){
                //se avaliacao da consulta for por id, mostra as informações de abannerdo com aquele id.
                case(1): $consulta .= " WHERE id = :procurar"; break;
                //se avaliacao da consulta for por titulo, mostra as informações de abannerdo com aquele titulo.
                case(2): $consulta .= " WHERE titulo LIKE :procurar"; "%".$procurar .="%"; break;
                case(3): $consulta .= " WHERE avaliacao LIKE :procurar"; "%".$procurar .="%"; break;
                //se avaliacao da consulta for por banner, mostra as informações de abannerdo com aquele banner.
                case(4): $consulta .= " WHERE banner LIKE :procurar "; $procurar = "%".$procurar."%"; break;
                //se avaliacao da consulta for por pchave, mostra as informações de abannerdo com aquele pchave.
                case(5): $consulta .= " WHERE pchave = :procurar "; break;
                case(6): $consulta .= " WHERE estagio = :procurar "; break;
                case(7): $consulta .= " WHERE = :procurar "; break;
            }

        if ($buscar > 0)
            $parametros = array(':procurar'=>$procurar);
        else 
            $parametros = array();
        return parent::buscar($consulta, $parametros);
    }
    
}

?>