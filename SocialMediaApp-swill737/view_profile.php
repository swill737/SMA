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
						echo "<tr> <td colspan='5' align='center'> <table align='center'>
							<tr  align='center'>
								<td align='right'>Name:- </td> <td align='left'>".$_SESSION["name"]." </td> </tr> 
								<tr align='center'>
									<td align='right'>Email:- </td> <td align='left'>".$_SESSION["email"]." </td> </tr>
									<tr align='center'>
										<td align='right'>Gender:- </td> <td align='left'>".$_SESSION["gender"]."</td> </tr>
										<tr align='center'>
											<td align='right'>Age:- </td> <td align='left'>".$_SESSION["age"]."  </td> </tr>
											<tr align='center'>
												<td align='right'>Password:- </td> <td align='left'>".$_SESSION["password"]."  </td> </tr> </table> </td> </tr>";
								
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
