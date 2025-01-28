<?php
define('CONTROL', true);

require_once('../server.php');
require_once('../server_functions.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['idUser'])){
        $id = $_POST['idUser'];
    }

    $server = new Query_functions();
    $name = $server->buscar_nome($id);
    $phone = $server->buscar_numero($id);
    $email = $server->buscar_email($id);

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">
    <!-- Font-Aewsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>MyContactBase</title>
    <style>
        /* Fundo escuro com opacidade */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none; /* Inicialmente escondido */
            z-index: 1;
        }

        /* Card de Adicionar no centro */
        .add-card {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            z-index: 2;
            display: none; /* Inicialmente escondido */
        }
    </style>
</head>
<body>

    <div class="container">

        <!-- Header -->
        <div class="row text-center mb-4">
            <div class="col bg-dark text-white py-3">
                <h3>MyContactBase</h3>
            </div>
        </div>

        <div class="row my-5 justify-content-center">
            <div class="col-6 shadow p-3">
                <form id="addNowForm" action="../inc/update.php" method="post">
                    <div class="mb-3">
                        <input type="hidden" name="idUser" value="<?=$id?>">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Enter your name" value="<?=$name['name']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputPhone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" name="inputPhone" id="inputPhone" placeholder="11912345678" value="<?=$phone['phone']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="example@example.com" value="<?=$email['email']?>" required>
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <button type="submit" class="btn btn-primary w-100" id="addnowbtn">Update</button>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-secondary" id="canceledit">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com.br|com)$/;
    const phoneRegex = /^[1-9]{2}9[0-9]{8}$/;

    const inputName = document.querySelector("#inputName");
    const inputPhone = document.querySelector("#inputPhone");
    const inputEmail = document.querySelector("#inputEmail");

    const addnowbtn = document.querySelector("#addnowbtn");

    // Função para validar os campos
    function validateFields() {
        const isEmailValid = emailRegex.test(inputEmail.value);
        const isPhoneValid = phoneRegex.test(inputPhone.value);
        const isNameValid = inputName.value.trim().length > 5; // Nome deve ter mais de 5 caracteres

        // Habilitar o botão se todos os campos forem válidos
        addnowbtn.disabled = !(isEmailValid && isPhoneValid && isNameValid);
    }

    // Adiciona evento de validação nos campos de entrada
    inputEmail.addEventListener('input', validateFields);
    inputPhone.addEventListener('input', validateFields);
    inputName.addEventListener('input', validateFields);

    const canceledit = document.querySelector("#canceledit");
    canceledit.addEventListener('click', ()=>{
        window.location.href = "../index.php";
    });

</script>
</body>
</html>


