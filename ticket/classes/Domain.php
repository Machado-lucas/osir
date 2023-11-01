<?php 
class Domains extends Database {
    private $dbConnect = false;

    public function __construct() {
        $this->dbConnect = $this->dbConnect();
    } 

    public function isAuthorized( $user_type) {
        return $user_type == 1; 
    }

    public function createDomain($user_id, $user_type, $domainName) {
        if ($this->isAuthorized( $user_type)) {
            $domainName = mysqli_real_escape_string($this->dbConnect, $domainName);

            $sql = "INSERT INTO domain (domain, status, created_by) VALUES ('$domainName', 1, $user_id)";

            $result = mysqli_query($this->dbConnect, $sql);

            if ($result) {
                header("Location: ../pages/domains.php");
                return true;
            } else {
                echo "Erro: " . mysqli_error($this->dbConnect);
                return false;
            }
        } else {
            return "Acesso negado, usuário não permitido";
        }
    }

    public function getDomains($user_id, $user_type) {
        if ($this->isAuthorized( $user_type)) {
            $sql = "SELECT * FROM domain";
            $result = mysqli_query($this->dbConnect, $sql);

            if ($result) {
                $domains = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $domains[] = $row;
                }
                return $domains;
            } else {
                echo "Erro: " . mysqli_error($this->dbConnect);
                return false; 
            }
        } else {
            return "Acesso negado, usuário não permitido";
        }
    }

    public function editDomain($domain_id, $newDomain, $newStatus, $user_id, $user_type) {

        if (!$this->isAuthorized($user_type)) {
            return "Acesso negado, usuário não permitido";
        }

        $sql = "UPDATE domain SET domain = '$newDomain', status = $newStatus WHERE id = $domain_id";
        
        $result = mysqli_query($this->dbConnect, $sql);

        if ($result) {
            header("Location: ../pages/domains.php");
            return true;
        } else {
            echo "Erro: " . mysqli_error($this->dbConnect);
            return false;
        }
    }

    public function isDomainValid($email) {
        $sql = "SELECT COUNT(*) as count FROM domain WHERE domain = '$email' AND status=1";

        $result = mysqli_query($this->dbConnect, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $count = $row['count'];

            if ($count > 0) {
                return true;
            }

            return false;
        } else {
            echo "Erro: " . mysqli_error($this->dbConnect);
            return false;
        }
    }
}

?>