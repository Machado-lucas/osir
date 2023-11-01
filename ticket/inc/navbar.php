<nav class="navbar navbar-expand-sm navbar-light">
    <span class="mb-0 h1">Sistema</span>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php 
            if ($_SESSION['user_type'] == 1) {
            ?>
            <li class="nav-item active">
                <a href="../pages/internRegister.php" class="nav-link">
                    Cadastro Interno
                </a>
            </li>
            <li class="nav-item active">
                <a href="../pages/domains.php" class="nav-link">
                    Gerenciar domínios
                </a>
            </li>
            <?php }?>
            <li class="nav-item active">
                <a href="../pages/ticket.php" class="nav-link">
                    Tickets
                </a>
            </li>
            <li class="nav-item active">
                <a href="../functions/logout.php" class="nav-link">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>