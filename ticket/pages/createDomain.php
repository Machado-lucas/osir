<?php 
    include '../init.php';

    if($users->isLoggedIn() == false) {
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
        <h3 >Criar Domínio</h3>

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" name="domain" placeholder="Exemplo: @dominio.com">
            <label for="floatingInput">Domínio</label>
        </div>

        <button class="btn btn-primary w-100 py-2">Inserir domínio</button>
    </form>
</main>
