<?php
include 'DAO/AgendaTelefonicaDAO.php';

class AgendaTelefonica{

    private $agendaTelefonicaDAO;

    public function __construct() {

        $this->agendaTelefonicaDAO = new AgendaTelefonicaDAO();
    }

    public function delete($id){
        if(!empty($id)){
            return $this->agendaTelefonicaDAO->apagar($id);
        }else{
            return false;
        }
    }

	public function put($elementos, $id){
		return $this->agendaTelefonicaDAO->atualizar($elementos, $id);
	}

    public function post($elementos){
        return $this->agendaTelefonicaDAO->inserir($elementos);
    }

	public function get($id = null){
        if(empty($id) || $id == ""){
            return json_encode($this->agendaTelefonicaDAO->getListarContatos($id));
        }else{
            return json_encode($this->agendaTelefonicaDAO->getListarContatosPorId($id));
        }
	}
}

?>