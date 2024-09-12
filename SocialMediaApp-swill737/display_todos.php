<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' href='page_css.css'>
    <title>Student's Hangout</title>
    <script src='jquery.js'></script>
    <script type='text/javascript'>
    $(document).ready(function() {
        $("#sam").hide(2000);
    });
    </script>
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
                session_start(); 
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

        <!-- To-Do List Section -->
        <?php
        require 'db_connection.php'; // Include your database connection file

        // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: login.php');
            exit;
        }

        $user_id = $_SESSION['user_id'];

        // Fetch to-do items
        $query = "SELECT * FROM todos WHERE user_id = ? ORDER BY created_at DESC";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        ?>

        <tr>
            <td colspan='5' align='center'>
                <h2>My To-Do List</h2>
                <ul>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <li>
                            <?php echo htmlspecialchars($row['task']); ?>
                            <?php if ($row['status'] === 'completed'): ?>
                                <span>(Completed)</span>
                            <?php else: ?>
                                <a href="complete_todo.php?id=<?php echo $row['id']; ?>">Complete</a>
                            <?php endif; ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <a href="add_todo.php"><button>Add New Task</button</a>
            </td>
        </tr>
    </table>

    <?php
    $stmt->close();
    $mysqli->close();
    ?>
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
