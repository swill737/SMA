<!doctype html>
<html>
<head>
    <link rel='stylesheet' href='page_css.css'>
    <title>Student's Hangout</title>
</head>
<body>
    <table cellpadding='3' cellspacing='3' class='tab_main'>
        <!-- Logo -->
        <tr>
            <td colspan='5'><img src='images/logo.png' height='65%' width='100%'></td> <!--1350x160-->
        </tr>
        <!-- Nav Tabs -->
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
            <td><hr></td> 
            <td><hr></td> 
            <td><hr></td> 
            <td><hr></td> 
            <td><hr></td>
        </tr>
        <?php
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
            include 'mysql.php'; // Ensure this file sets $resid correctly
            
            if ($resid) {
                $count = MySQLi_Query($resid, "SELECT frnd_two_id FROM are_friends WHERE frnd_one_id = $user_id UNION SELECT frnd_one_id FROM are_friends WHERE frnd_two_id = $user_id");

                echo "<tr align='center'> <td colspan='5'>Your Friends:</td> </tr> <tr align='center'> <td colspan='5'><table align='center' cellspacing='5' cellpadding='5'> <tr> <th>Name:</th> <th>Email:</th> <th>Gender:</th> </tr>";
                
                while (($rows = MySQLi_Fetch_Row($count)) == True) {
                    $query = "SELECT name, email, gender FROM students WHERE id = $rows[0]";
                    $result = MySQLi_Query($resid, $query);

                    if ($result) {
                        while (($rows = MySQLi_Fetch_Row($result)) == True) {
                            echo "<tr align='center'>";
                            echo "<td>$rows[0]</td> <td>$rows[1]</td> <td>$rows[2]</td>";
                            echo "</tr>";
                        }
                    }
                }
                echo "</table></td></tr>";
            }
        } else {
            echo "<tr align='center'> <td colspan='5'> <font color='red'> Sorry, You are not logged in! </font> <a href='login.php'>Login</a> </td> </tr>";
        }
        ?>
    </table>
</body>
<footer align='center'>
        <a href="https://github.com/abhn">MIT License Copyright &copy 2019 Abhishek Nagekar</a>
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
            updateClock();
        </script>
    </footer>
</html>
