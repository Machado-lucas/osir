<?php
include '../init.php';

if (!$users->isLoggedIn()) {
    header('Location: login.php');
}

if ($_SESSION['user_type'] != 1) {
    header('Location: ticket.php');
}

include('../inc/header.php');
include('../inc/navbar.php');


?>

<main class="w-100 py-2 m-auto container">
    <form method="post" action="../functions/domain.php">
        <h3>Editar Domínio</h3>

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" name="domainName" placeholder="Exemplo: @dominio.com" value="<?php echo $_GET['domainName']; ?>">
            <input type="hidden" name="domainId" value="<?php echo $_GET['id']; ?>">
            <label for="floatingInput">Domínio</label>
        </div>

        <div class="mb-3">
            <label for="status">Status</label>
            <select class="form-select" name="status" id="status">
                <option value="1" <?php if ($_GET['status'] == 1) echo 'selected'; ?>>Ativo</option>
                <option value="0" <?php if ($_GET['status'] == 0) echo 'selected'; ?>>Inativo</option>
            </select>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit"  name="update">Atualizar domínio</button>
    </form>
</main>