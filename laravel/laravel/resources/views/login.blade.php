<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @extends('import')
        <style>
            html, body {
                height: 100%;
            }

            .form-container {
                max-width: 300px;
                padding: 1rem;
            }
        </style>
    </head>
    
    <body class="d-flex align-items-center py-4 bg-body-tertiary">
        <main class="w-100 m-auto form-container">
            <form method="post" action="../functions/login.php">
                <h3 class="mb-3 fw-normal">Login</h3>
    
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="seuemail@email.com">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingInput" name="password" placeholder="Senha">
                    <label for="floatingInput">Senha</label>
                </div>
    
                <button class="btn btn-primary w-100 py-2">Entrar</button>
    
                <a href="registro.php">Registre-se</a>
            </form>
        </main>
    </body>
</html>
