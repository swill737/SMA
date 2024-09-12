<?php
session_start();
require 'db_connection.php';
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = trim($_POST['task']);
    $user_id = $_SESSION['user_id'];

    if (!empty($task)) {
        $query = "INSERT INTO todos (user_id, task) VALUES (?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('is', $user_id, $task);
        $stmt->execute();
        $stmt->close();
        header('Location: display_todos.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Task</title>
    <link rel="stylesheet" href="page_css.css"> <!-- Include your CSS file -->
</head>
<body>
    <table cellpadding='3' cellspacing='3' class='tab_main'>
        <!--Logo-->
        <tr>
            <td colspan='5'><img src='images/logo.png' height='65%' width='100%'></td>
            <!--1350x160-->
        </tr>
        <!--Nav_Tabs-->
        <tr align='center' bgcolor='lightgrey' class='td_bor'>
            <td width='5%'>
                <?php 
                if(isset($_SESSION["user_id"])) {
                    echo "<a href='user_page.php'><button>Home</button></a>"; 
                } else {
                    echo "<a href='home.php'><button>Home</button></a>";
                }
                ?>
            </td>

            <td width='5%'>
                <a href='send_message.php'>
                    <button>Send Message</button>
                </a>
            </td>

            <td width='5%'>
                <a href='inbox.php'>
                    <button>Inbox (Only Recent Message)</button>
                </a>
            </td>

            <td width='5%'>
                <a href='view_profile.php'>
                    <button>View Profile</button>
                </a>
            </td>

            <td width='5%'>
                <a href='signout.php'>
                    <button>Signout</button>
                </a>
            </td>
        </tr>

        <tr>
            <td> <hr> </td>
            <td> <hr> </td>
            <td> <hr> </td>
            <td> <hr> </td>
            <td> <hr> </td>
        </tr>

        <!-- Add New Task Section -->
        <tr>
            <td colspan='5'>
                <h2>Add New Task</h2>
                <form action="add_todo.php" method="post">
                    <label for="task">Task:</label>
                    <input type="text" id="task" name="task" required>
                    <button type="submit">Add Task</button>
                </form>
                <a href="display_todos.php"><button>Back to To-Do List</button></a>
            </td>
        </tr>
    </table>
</body>
<footer align='center'>
        <a href="LICENSE">MIT License Copyright &copy 2019 Abhishek Nagekar</a>
	<br>
	<div id="clock"></div>
	<script>
        // Inline JavaScript for Clock
        const clock = document.getElementById('clock');

        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const timeString = `${hours}:${minutes}:${seconds}`;
            clock.textContent = timeString;
        }

        setInterval(updateClock, 1000);

        // Initial call to display the clock immediately
        updateClock();
    </script>
        <?php if(isset($_SESSION["user_id"])) {echo $_SESSION["name"]; } ?>
     </footer>

</html>
