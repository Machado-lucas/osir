<?php 
    include '../init.php';

    
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $users->login($email, $password);

?>