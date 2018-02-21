<?php

    header('Content-Type: application/json');

	include 'Action/AgendaTelefonica.php';
    $agendaTelefonica = new AgendaTelefonica();

    $id = "";
    $caminho = array();

    if(!empty($_SERVER['QUERY_STRING'])) {
        $caminho = explode('=', trim($_SERVER['QUERY_STRING'],'/'));
        $id = (isset($caminho[1]) || $caminho[1] != '' ? $caminho[1] : "");
    }

    echo (($_SERVER['REQUEST_METHOD'] == "GET") ? $agendaTelefonica->get($id) : 
            (($_SERVER['REQUEST_METHOD'] == "PUT") ? $agendaTelefonica->put(file_get_contents('php://input'), $id) :
                (($_SERVER['REQUEST_METHOD'] == 'POST') ? $agendaTelefonica->post($_POST) : 
                    (($_SERVER['REQUEST_METHOD'] == "DELETE") ? $agendaTelefonica->delete($id) : "[]" ))));
?>