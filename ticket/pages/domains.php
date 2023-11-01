<?php 
    include_once '../init.php';

    if($users->isLoggedIn() == false) {
        header('Location: login.php');
    }
    if ($_SESSION['user_type'] != 1) {
        header('Location: ticket.php');
    }

    include('../inc/header.php');
    include('../inc/navbar.php');
    require_once('../functions/domain.php');

    
?>
<div class="container">
    
    <table class="table table-striped table-hover table-secondary">
        <thead>
            <tr>
                <th>ID</th>
                <th>Domínio</th>
                <th>Status</th>
                <th>Última atualização</th>
                <th></th>
            </tr>
        </thead>
    
        <tbody>
            <?php get_domains($domains) ?>
        </tbody>
    </table>

    <a href="createDomain.php">Criar domínios</a>
</div>