<?php 
class Users extends Database {
    private $dbConnect = false;

    public function __construct() {
        $this->dbConnect = $this->dbConnect();
    } 

    public function isLoggedIn () {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password){		
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($this->dbConnect, $sql);

        if ($result && mysqli_num_rows($result) == 1) {
            $userDetails = mysqli_fetch_assoc($result);
            session_start();

            $_SESSION['user_id'] = $userDetails['id'];
			$_SESSION['user_name'] = $userDetails['name'];
            $_SESSION['user_type'] = $userDetails['user_type']; // 1- Administrador, 2 - Suporte, 3 - Usuário comum

            header("Location: ../pages/ticket.php");
            return true;
        } else {
            echo "Erro: " . mysqli_error($this->dbConnect);
            return false;
        }	
	}


    public function register($name, $email, $password, $user_type) {
        $sql = "INSERT INTO users (name, email, password, user_type, status) VALUES ('$name', '$email', '$password', '$user_type', 1)";
        $result = mysqli_query($this->dbConnect, $sql);

        if ($result === false) {
            echo "Erro: " . mysqli_error($this->dbConnect);
        } else {
            if (mysqli_affected_rows($this->dbConnect) > 0) {
                header("Location: ../pages/login.php");
            } 
        }

        $errorMessage = "Um erro ocorreu! Tente novamente";
        return $errorMessage;
    }

    public function getUserName ($userId) {
        $userId = mysqli_real_escape_string($this->dbConnect, $userId);

        $sql = "SELECT name FROM users WHERE id = $userId";
        $result = mysqli_query($this->dbConnect, $sql);

        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            return $row['name'];
        } else {
            return false;
        }
    }
}

?>