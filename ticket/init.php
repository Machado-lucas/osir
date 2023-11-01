<?php 
session_start();
include('config.php');
define('HOST', $host);
define('USER', $username);
define('PASSWORD', $password);
define('DATABASE', $database);

require('classes/Database.php');
require('classes/User.php');
require('classes/Ticket.php');
require('classes/Domain.php');

$database = new Database;
$users = new Users;
$tickets = new Tickets;
$domains = new Domains;
?>