<!doctype html>
<html>
<head>
    <link rel='stylesheet' href='page_css.css'>
    <title> Student's Hangout </title>
        <script type='text/javascript'>
        function sec() {
            var email=document.f1.e1.value;
            var password=document.f1.p1.value;


            if(email.length==0||password.length==0) {

                if(email.length==0) {
                s1.innerHTML="<font color='red'>Field is Required</font>";

                }


                if(password.length==0) {
                s2.innerHTML="<font color='red'>Field is Required</font>";

                }
            }

            else if (email.length>50||password.length>50) {

                if(email.length>50) {
                s3.innerHTML="<font color='red'>Characters should be less than 50 </font>";

                }

                if(password.length>50) {
                s4.innerHTML="<font color='red'>Characters should be less than 50 </font>";

                }
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
					<a href='home.php'>
						<button>Home</button>
					</a>
				</td>
				
				<td width='5%'>
					<a href='login.php'>
						<button class="selected">Login</button>
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

            <tr align='center'> 
                <td colspan='5'>
                    <form method='POST' name='f1' action='user_page.php'>
                        <table>
                            <tr>
                                <td> Email:- </td> <td> <input type='email' name='e1' maxlength='50'> </td> <td> <span id='s1'> </span> </td>  <td> <span id='s3'> </span> </td>
                            </tr>

                            <tr>
                                <td> Password:- </td> <td> <input type='password' name='p1' maxlength='50'> </td> <td> <span id='s2'> </span> </td> <td> <span id='s4'> </span> </td>
                            </tr>

                            <tr>
                                <td> </td> <td> <input type='hidden' name='h1' value='holla'>  </td>
                            </tr>

                            <tr>
                                <td> <br> <input type='button' value='Login' name='s1' onclick='sec()'> </td> <td> <br> OR <a href='secure_signup.php'>Sign-up</a></td> 
                            </tr>
                        </table>
                    </form>
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