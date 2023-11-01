<?php 
    include '../init.php';

    if (isset($_POST['registerUser'])) {
        $user_type = $_POST['user-type'];
    } else{
        $user_type = 3;
    }
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);


    $validDomain = verifyDomain($domains, $email);

    if ($validDomain === false) {
        echo "Domínio inválido, tente novamente"; 
        return false;
    }

    return false;
    $users->register($name, $email, $password, $user_type);

    function verifyDomain($domains, $email) {
        $domain = substr(strrchr($email, "@"), 0);
        return $domains->isDomainValid($domain);
    }

?>