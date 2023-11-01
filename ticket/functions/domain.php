<?php 
    include_once '../init.php';


    if (isset($_POST['domain'])) {
        $domainName = $_POST['domain'];

        create_domain($domainName, $domains);
    }

    if (isset($_POST['update'])) {
        $user_id = $_SESSION['user_id'];
        $user_type = $_SESSION['user_type'];

        $domainName = $_POST['domainName'];
        $domainStatus = $_POST['status'];
        $domainId = $_POST['domainId'];

        edit_domain($domains, $domainId, $domainName, $domainStatus, $user_id, $user_type);
    } 


    function create_domain ($domainName, $domains) {
        if (strpos($domainName, "@") === 0) {
            $user_id = $_SESSION['user_id'];
            $user_type = $_SESSION['user_type'];

            $domains->createDomain($user_id, $user_type, $domainName);
            return true;
        } 


        echo "Domínio inválido, ele deve começar com @";
    }

    function get_domains($domains) {
        $user_id = $_SESSION['user_id'];
        $user_type = $_SESSION['user_type'];

        $domainsData = $domains->getDomains($user_id, $user_type);

        if ($domainsData) {
            foreach ($domainsData as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['domain'] . "</td>";
                echo "<td>" . get_status($row['status']) . "</td>";
                echo "<td>" . date("d/m/Y H:i:s", strtotime($row['updated_at'])) . "</td>";
                echo '<td> <a href="editDomain.php?id=' . $row['id'] . '&domainName='. $row['domain'] . '&status=' . $row['status'] .'">Editar</a> </td>';
                echo "</tr>";
            }
        } else {
            echo "Erro ao pegar os tickets.";
        }
    }

    function get_status ($status) {
        if($status) {
            return "Ativo";
        }

        return "Inativo";
    }

    function edit_domain($domains, $domainId, $domainName, $domainStatus, $user_id, $user_type) {
        $domains->editDomain($domainId, $domainName, $domainStatus, $user_id, $user_type);
    }

?>