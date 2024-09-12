<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
	<script type='text/javascript'>
		function sec() {
			var f_search=document.f1.search.value;
			if(f_search==0) {
				s1.innerHTML="<font color='red'>Field is Required</font>";
			}
			
			else if(f_search>50) {
				s2.innerHTML="<font color='red'>Characters should be less than 50 </font>";
			}
			
			else {
				document.f1.submit();
			}
			
		}
		</script>
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
			
				<tr align='center'> 
				<td colspan='5'>
					<form method='POST' name='f1' action='search_friends.php'>
						<table>
							<tr>
								<td> Search Friend:- </td> <td> <input type='text' name='search' maxlength='50'> </td> <td> <span id='s1'> </span> </td> <td> <span id='s2'> </span> </td>
							</tr>
							<tr>
								<td colspan='4' align='center'> <br> <input type='button' value='Search' onclick='sec()'> </td>
							</tr>
						</table>
					</form>
						</td>
				</tr>
				
				
			
			<?php
			if(IsSet($_SESSION["user_id"])) {
					$id=$_SESSION["user_id"];
					$query="select friend_name,friend_id from friends where receiver_id=".$id." and status=0 and comp=0";
					$resid=MySQLi_Connect('localhost','swill737','swill737','swill737');//'localhost' 'root' 'connectme' 'swill737'
				
					if(MySQLi_Connect_Errno()) {
						echo "<tr align='center'> <td colspan='5'> Failed to connect to MySQL </td> </tr>";
					}
					else {
						$result=MySQLi_Query($resid,$query);
						if($result==true) {
							$f=1;
							while(($rows=MySQLi_Fetch_Row($result))==True) {
							$f++;
							if($f==2) {
							echo "<tr align='center'> <td colspan='5'>Friend Requests:-</td> </tr>";
							}
							echo "<tr align='center'> <td colspan='5'>".$rows[0].", wants to be your friend! <form method='POST' action='access.php'>
							<input type='hidden' name='header1' value='".$rows[1]."'>
							<input type='submit' name='accp' value='Accept'> &nbsp;&nbsp;&nbsp; <input type='submit' name='decl' value='Decline'>
							</form></td> </tr>";
							
							}
							
						}	
						
						if($f<2)
						{
							echo "<tr align='center'> <td colspan='5'><font color='lightblue'> No Friend Requests!</font> </td> </tr>";
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

