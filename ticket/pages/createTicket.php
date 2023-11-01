<?php 
    include '../init.php';

    if($users->isLoggedIn() == false) {
        header('Location: login.php');
    }

    include('../inc/header.php');
    include('../inc/navbar.php');

?>

<main class="w-100 py-2 m-auto container">
    <form method="post" action="../functions/ticket.php">
        <h3 >Criar Ticket</h3>

        <div>
            <label for="" class="form-label">Tipo de Ticket</label>
            <select name="type" id="type" class="form-select">
                <option value="1">Bug</option>
                <option value="2">Ajuda</option>
                <option value="3">Implementações</option>
            </select>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" name="description" placeholder="Descrição">
            <label for="floatingInput">Descrição</label>
        </div>

        <button class="btn btn-primary w-100 py-2">Entrar</button>
    </form>
</main>
