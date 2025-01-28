<?php

defined('CONTROL') or die('Acesso negado!');
$server = new Query_functions();
$allData = $server->buscar_tudo();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se o botão de delete foi pressionado
    if (isset($_POST['deleteBtn']) && isset($_POST['contactId'])) {
        $id = $_POST['contactId']; // Captura o ID do contato a ser excluído
        $server->excluir_contato($id);
    }
} elseif (isset($_GET['deleteId'])) {
    $id = $_GET['deleteId']; // Captura o ID do contato a ser excluído
    $server->excluir_contato($id);
}
   
?>

<body>

    <div class="container">

        <!-- Header -->
        <div class="row text-center mb-4">
            <div class="col bg-dark text-white py-3">
                <h3>MyContactBase</h3>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <div class="col-12 d-flex justify-content-end mb-4">
                <button class="btn bg-primary text-white shadow" id="addnow" aria-label="Add Contact">Add Now</button>
            </div>

            <!-- Table contacts -->
            <div class="col px-1">
                <table class="table table-bordered table-striped shadow">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th><i class="fa-solid fa-user"></i> Name</th>
                            <th><i class="fa-solid fa-phone"></i> Phone</th>
                            <th><i class="fa-solid fa-envelope"></i> E-mail</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allData as $data): ?>
                            <tr>
                                <td><?= $data->name ?></td>
                                <td><?= $data->phone ?></td>
                                <td><?= $data->email ?></td>
                                <td class="d-flex justify-content-evenly">
                                    <form method="post">
                                        <button class="fa-solid fa-pen btn bg-warning" aria-label="Edit" name="editBtn" type="submit"></button>
                                    </form>
                                    <form method="post">
                                        <!-- O formulário de deletar agora envia o ID na URL -->
                                        <a href="?deleteId=<?= $data->id ?>" class="fa-solid fa-eraser btn bg-danger" aria-label="Delete"></a>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
        </div>

        <div class="overlay" id="overlay"></div>
        <div class="add-card w-50" id="addnowcard">
            <!-- Botão X para Fechar -->
            <div class="row justify-content-end">
                <div class="col-1">
                    <button class="btn fa-solid fa-xmark" id="closeAddNowCard" aria-label="Close"></button>
                </div>
            </div>

            <h4>Add New Contact</h4>
            <form id="addNowForm" action="inc/adicionar.php" method="post">
                <div class="mb-3">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">
                    <label for="inputPhone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" name="inputPhone" id="inputPhone" placeholder="11912345678" required>
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="example@example.com" required>
                </div>
                <button type="submit" class="btn btn-primary w-100" id="addnowbtn" disabled>Add Now</button>
            </form>
        </div>