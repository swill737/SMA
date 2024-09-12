<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='page_css.css'>
	<title> Student's Hangout </title>
</head>
<body>
		<table cellpadding='3' cellspacing='1' class='tab_main'>
			<!--Logo-->
			<tr>
				<td  colspan='5'><img src='images/logo.png' height='65%' width='100%' ></td> <!--1350x160-->
			</tr>
			<!--Nav_Tabs-->
			<tr align='center' bgcolor='lightgrey' class='td_bor'>
				<td width='5%'>
					<a href='home.php'>
						<button class="selected">Home</button>
					</a>
				</td>
				
				<td width='5%'>
					<a href='login.php'>
						<button>Login</button>
					</a>
				</td>
				
				<td width='5%'>
					<a href='secure_signup.php'>
						<button>Sign-up</button>
					</a>
				</td>

				<td width='5%'>
					<a href='contact-us.html'>
						<button>Contact-Us</button>
					</a>
				</td>

				<td width='5%'>
					<a href='about-us.html'>
						<button>About-Us</button>
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
			
			<tr>
				
				<td colspan='4'> 
				<p> 
					  <h2>Welcome to Socioexplore</h2>
				</p>	
				</td>
				
			</tr>

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
