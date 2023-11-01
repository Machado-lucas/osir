<?php 
    include_once '../init.php';


    if (isset($_POST['type']) && isset($_POST['description'])) {
        $type = $_POST['type'];
        $description = $_POST['description'];

        create_ticket($type, $description, $tickets);
    }

    if (isset($_POST['reason'])) {
        $ticketId = $_POST['ticketId'];
        $reason = $_POST['reason'];

        finish_ticket($ticketId, $reason, $tickets);
    }

    function create_ticket($type, $description, $tickets) {
        $protocol = rand(1000000, 1999999);
        $user_id = $_SESSION['user_id'];
        $responsable_id = 3;
        $created_by = $user_id;

        $tickets->createTicket($protocol, $type, $description, $user_id, $responsable_id, $created_by);
    }   

    function get_tickets($tickets) {
        $user_id = $_SESSION['user_id'];
        $user_type = $_SESSION['user_type'];

        $ticketsData = $tickets->getTickets($user_id, $user_type);

        if ($ticketsData) {
            foreach ($ticketsData as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['protocol'] . "</td>";
                echo "<td>" . get_ticket_type($row['type']) . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . get_ticket_status($row['closed_at']) . "</td>";
                echo "<td>" . date("d/m/Y H:i:s", strtotime($row['updated_at'])) . "</td>";
                echo '<td> <a href="viewTicket.php?id=' . $row['id'] . '">Acessar</a> </td>';
                echo "</tr>";
            }
        } else {
            echo "Erro ao pegar os tickets.";
        }
    }

    function get_ticket_type ($type) {
        switch ($type) {
            case 1: 
                return "Bug";
                break;
            case 2:
                return "Ajuda";
                break;
            case 3:
                return "Implementações";
                break;
        }
    }

    function get_ticket_status ($is_closed) {
        if ($is_closed) {
            return "Fechado";
        }

        return "Em andamento";
    }

    function finish_ticket ($ticketId, $reason, $tickets) {
        $dateTime = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));
        $closed_at = $dateTime->format("Y-m-d H:i:s");

        $tickets->closeTicket($closed_at, $reason, $ticketId);

    }
?>