<?php
define('CONTROL', true);

require_once('../server.php');
require_once('../server_functions.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['idUser'])){
        $id = $_POST['idUser'];
    }

    $name = $_POST['inputName'];
    $phone = $_POST['inputPhone'];
    $email = $_POST['inputEmail'];

    if (strlen($name) < 5) {
        echo "O nome deve ter pelo menos 5 caracteres.";
        exit;
    }

    $phoneRegex = '/^[1-9]{2}9[0-9]{8}$/';
    if (!preg_match($phoneRegex, $phone)) {
        echo "O número de telefone deve ter 11 dígitos e começar com 9.";
        exit;
    }

    $emailRegex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com.br|com)$/';
    if (!preg_match($emailRegex, $email)) {
        echo "O email deve ser válido e ter o domínio .com ou .com.br.";
        exit;
    }

    $server = new Query_functions();
    $allData = $server->atualizar_contato($id, $name, $phone, $email);
    header('location: ../?route=home');
    exit;
}
?>