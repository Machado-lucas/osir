<?php 

class Tickets extends Database {
    private $dbConnect = false;

    public function __construct() {
        $this->dbConnect = $this->dbConnect();
    } 

    public function createTicket($protocol, $type, $description, $user_id, $responsable_id, $created_by) {
        $sql = "INSERT INTO tickets (protocol, type, description, user_id, responsable_id, created_by) VALUES ('$protocol', $type, '$description', $user_id, $responsable_id, $created_by)";

        $result = mysqli_query($this->dbConnect, $sql);

        if ($result === false ) {
            echo "Erro: " . mysqli_error($this->dbConnect);
            return false;
        } else if (mysqli_affected_rows($this->dbConnect) > 0) {
            header("Location: ../pages/ticket.php");
        }
    }

    public function getTickets($user_id, $user_type) {
        $user_id = mysqli_real_escape_string($this->dbConnect, $user_id);
        $user_type = mysqli_real_escape_string($this->dbConnect, $user_type);


        if ($user_type == 3) {
            $sql = "SELECT * FROM tickets WHERE user_id = $user_id";
        } else {
            $sql = "SELECT * FROM tickets";
        }        
        
        $result = mysqli_query($this->dbConnect, $sql);

        if ($result) {
            $tickets = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $tickets[] = $row;
            }
            return $tickets;
        } else {
            return false;
        }
    }

    public function getTicketDetails($ticketId) {
        $ticketId = mysqli_real_escape_string($this->dbConnect, $ticketId);

        $sql = "SELECT * FROM tickets WHERE id = $ticketId";
        $result = mysqli_query($this->dbConnect, $sql);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            return false;
        }
    }

    public function closeTicket($closed_at, $reason, $ticketId) {
        $closed_at = mysqli_real_escape_string($this->dbConnect, $closed_at);
        $reason = mysqli_real_escape_string($this->dbConnect, $reason);
        $ticketId = mysqli_real_escape_string($this->dbConnect, $ticketId);

        $sql = "UPDATE tickets SET closed_at = '$closed_at', closure_reason = '$reason' WHERE id = $ticketId";

        $result = mysqli_query($this->dbConnect, $sql);

        if ($result) {
            header("Location: ../pages/ticket.php");
            return true; 
        } else {
            echo "Erro: " . mysqli_error($this->dbConnect);
            return false;
        }
    }
}


?>