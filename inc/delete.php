<?php

require_once('../server.php');
require_once('../server_functions.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['idUser'])){
        $id = $_POST['idUser'];
    }

    $server = new Query_functions();
    $allData = $server->excluir_contato($id);
    header('location: ../?route=home');
    exit;
}

?>