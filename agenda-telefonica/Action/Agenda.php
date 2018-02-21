<?php


class Agenda{

    private $RESTFull;
    private $acao;
    private $view;

    function __construct() {
        $this->RESTFull  = "http://localhost/madeira-madeira/RESTFull/index.php";
        $this->acao      = (isset($_GET["acao"]) ? $_GET["acao"] : NULL);
        $this->view      = new stdClass;

        $this->index();
    }

    public function index(){

        if($this->acao == "cadastrar"){
            $this->cadastrar($_POST);
        }elseif ($this->acao == "deletar") {
            $this->deletar($_POST);
        }elseif ($this->acao == "editar") {
            $this->editar($_POST);
        }

        $this->view->contatos = $this->getContatos();

        require './View/template/cabecalho.php';
        require './View/agenda.php';
        require './View/template/rodape.php';
    }

    public function getContatos(){

        $init = curl_init($this->RESTFull);

        curl_setopt($init, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($init, CURLOPT_CUSTOMREQUEST, "GET");

        $retorno = curl_exec($init);
        
        curl_close($init);

        return json_decode($retorno, true);
    }

    public function getContato($id){

        $init = curl_init($this->RESTFull."?id=".$id);

        curl_setopt($init, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($init, CURLOPT_CUSTOMREQUEST, "GET");

        $retorno = curl_exec($init);
        
        curl_close($init);

        return json_decode($retorno);
    }

    public function cadastrar($parametros){

        $init = curl_init($this->RESTFull);

        curl_setopt($init, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($init, CURLOPT_POSTFIELDS, $parametros);
        curl_setopt($init, CURLOPT_CUSTOMREQUEST, "POST");

        $retorno = curl_exec($init);

        curl_close($init);

        return true;

    }

    public function deletar($parametros){

        $id = $parametros;

        $init = curl_init($this->RESTFull."?id=".$id);

        curl_setopt($init, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($init, CURLOPT_CUSTOMREQUEST, "DELETE"); 

        $retorno = curl_exec($init);

        curl_close($init);

        return true;
    }

    public function editar($parametros){
        
        $init = curl_init($this->RESTFull."?id=".$parametros["id"]);

        curl_setopt($init, CURLOPT_CUSTOMREQUEST, "GET");

        //$retorno = curl_exec($init);
        
        curl_close($init);

        curl_setopt($init, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($init, CURLOPT_POSTFIELDS, json_decode($retorno));
        curl_setopt($init, CURLOPT_CUSTOMREQUEST, "PUT");

        $retorno = curl_exec($init);

        curl_close($init);

        return true;

    }

}
