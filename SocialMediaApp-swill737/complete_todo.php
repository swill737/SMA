// complete_todo.php

<?php
session_start();
require 'db_connection.php'; // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Update the task status
    $query = "UPDATE todos SET status = 'completed' WHERE id = ? AND user_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ii', $id, $user_id);
    $stmt->execute();
    $stmt->close();
}

header('Location: display_todos.php');
exit;
