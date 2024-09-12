<?php
$host = 'localhost';
$db = 'swill737'; // Database name from your previous messages
$user = 'swill737'; // Your database username
$pass = 'swill737'; // Your database password

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
?>
