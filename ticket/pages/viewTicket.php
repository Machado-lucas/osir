<?php 
    include_once '../init.php';

    if($users->isLoggedIn() == false) {
        header('Location: login.php');
    }

    include('../inc/header.php');
    include('../inc/navbar.php');
    require_once('../functions/ticket.php');


    if (isset($_GET['id'])) {
        $ticketId = $_GET['id'];
    
        $ticketInfo = $tickets->getTicketDetails($ticketId);
        $responsibleUser = $users->getUserName($ticketInfo['responsable_id']);
        $createdBy = $users->getUserName($ticketInfo['user_id']);
    
        if ($ticketInfo) {
?>
            <h1>Detalhes do ticket</h1>
            <p>Criado por: <?= $createdBy?></p>
            <p>ID: <?= $ticketInfo['id']?></p>
            <p>Status: <?= get_ticket_status($ticketInfo['closed_at'])?></p>
            <p>Descrição: <?= $ticketInfo['description'] ?></p>
            <p>Data de abertura: <?= date("d/m/Y", strtotime($ticketInfo['created_at']))?></p>
            <?php 
                if($ticketInfo['closed_at']) {
                    echo "<p>Data de fechamento: " . date("d/m/Y", strtotime($ticketInfo['closed_at'])) . "</p>";
                    echo "<p>Motivo do fechamento: " . $ticketInfo['closure_reason'] . "</p>";
                }
            ?>
            <p>Protocolo: <?= $ticketInfo['protocol'] ?></p> 
            <p>Responsável: <?= $responsibleUser ?></p> 

            <?php 
                if(!$ticketInfo['closed_at'] && $_SESSION['user_type'] != 3) {
            ?>
            <button class="btn btn-danger" id="cancelTicketButton">Encerrar Ticket</button>
            <?php }?>

            <?php 
                if($_SESSION['user_type'] != 3) {
            ?>
            <div id="cancellationReason" style="display: none;">
                <form action="../functions/ticket.php" method="post">
                    <label for="reason">Motivo do Encerramento:</label>
                    <input type="text" name="reason" id="reason">
                    <input type="hidden" name="ticketId" id="ticketId" value="<?= $ticketInfo['id'] ?>">
                    <button type="submit" id="submitCancellation">Confirmar Encerramento</button>
                </form>
            </div>
            <?php 
                }
            ?>

<?php            
        } else {
            echo "Ticket not found or an error occurred.";
        }
    } else {
        echo "Invalid request. Missing ticket ID.";
    }

?>

<script>
    document.getElementById("cancelTicketButton").addEventListener("click", function() {
        document.getElementById("cancellationReason").style.display = "block";
    });
</script>