<?php 
    include_once '../init.php';

    if($users->isLoggedIn() == false) {
        header('Location: login.php');
    }

    include('../inc/header.php');
    include('../inc/navbar.php');
    require_once('../functions/ticket.php');

?>
<div class="container">
    
    <table class="table table-striped table-hover table-secondary">
        <thead>
            <tr>
                <th>ID</th>
                <th>Protocolo</th>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Última atualização</th>
                <th></th>
            </tr>
        </thead>
    
        <tbody>
            <?php get_tickets($tickets) ?>
        </tbody>
    </table>

    <a href="createTicket.php">Criar ticket</a>
</div>