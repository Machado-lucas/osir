<?php 
    include '../init.php';
    if($users->isLoggedIn()) {
        header('Location: ticket.php');
    }

    include('../inc/header.php');
?>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
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

            <button class="btn btn-primary w-100 py-2">Entrar</button>

            <a href="login.php">Já tem uma conta?</a>
        </form>
    </main>
</body>