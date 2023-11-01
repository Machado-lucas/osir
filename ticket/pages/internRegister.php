<?php 
    include '../init.php';
    if(!$users->isLoggedIn()) {
        header('Location: login.php');
    }

    include('../inc/header.php');
    include('../inc/navbar.php');

?>

    <main class="w-100 m-auto form-container">
        <form method="post" action="../functions/registro.php">
            <h3 class="mb-3 fw-normal">Registro</h3>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="name" placeholder="Nome">
                <label for="floatingInput">Nome</label>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="seuemail@email.com">
                <label for="floatingInput">Email</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" id="floatingInput" name="password" placeholder="Senha">
                <label for="floatingInput">Senha</label>
            </div>

            <div class="mb-3">
            <label for="user-type">Tipo de funcionário</label>
            <select class="form-select" name="user-type" id="user-type">
                <option value="2">Responsável</option>
                <option value="3">Usuário Comum</option>
            </select>
        </div>

            <button class="btn btn-primary w-100 py-2" name="registerUser">Registrar funcionário</button>

        </form>
    </main>
