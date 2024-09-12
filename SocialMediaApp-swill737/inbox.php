<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
</head>
<body>
		<table cellpadding='3' cellspacing='3' class='tab_main'>
			<!--Logo-->
			<tr>
				<td  colspan='5'><img src='images/logo.png' height='65%' width='100%' ></td> <!--1350x160-->
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
			
			<?php
			//Session_start();
			if(IsSet($_SESSION["user_id"])) {
				$id=$_SESSION["user_id"];
				$query="select * from messages where receiver_id=".$id." order by id desc";
				$resid=MySQLi_Connect('localhost','swill737','swill737','swill737');
				
				if(MySQLi_Connect_Errno()) {
					echo "<tr align='center'> <td colspan='5'> Failed to connect to MySQL </td> </tr>";
				}
				else {
				$result=MySQLi_Query($resid,$query);
				$data=MySQLi_Fetch_Row($result);
				if($data) {
				$query="select name,email from students where id=".$data[1]."";
				$sender=MySQLi_Query($resid,$query);
				$sender=MySQLi_Fetch_Row($sender);
				//if($data) {
				 
				echo "<tr align='center'> <td colspan='5'> <table cellpadding='4' cellspacing='5' width='100%' style='table-layout:fixed'> <col width='100%'> ";
				echo "<td>From:- <font color='blue'>".$sender[0]." </font> [".$sender[1]."] </td> </tr>";
				echo "<tr> <td style='word-wrap:break-word'>Message:-".$data[3]."</td> </tr>";
				echo "</table> </td> </tr>";
				
			}
				else {
				echo "<tr align='center'> <td colspan='5'> <font color='lightblue'> No Messages! </font> </td> </tr>";
				}
				MySQLi_Close($resid);
				}
			}
			else {
				echo "<tr align='center'> <td colspan='5'> <font color='red'> Sorry, You not Logged in! </font> Login again:- <a href='login.php'>Login</a> </td> </tr>";

			}
			
			?>
		</table>
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

        // Initial call to display the clock immediately
        updateClock();
    </script>
	
			</footer>
</body>
</html>
		
		
