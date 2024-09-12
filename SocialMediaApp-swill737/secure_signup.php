<!doctype html>
<html>
<head>
    <link rel='stylesheet' href='page_css.css'>
    <title> Student's Hangout </title>
    <script type='text/javascript'>
        function sec() {
            var name = document.f1.n1.value;
            var email = document.f1.e1.value;
            var age = document.f1.a1.value;
            var password = document.f1.p1.value;

            if (name.length == 0 || email.length == 0 || age.length == 0 || password.length == 0) {
                if (name.length == 0) {
                    s1.innerHTML = "<font color='red'>Field is Required</font>";
                }
                if (email.length == 0) {
                    s2.innerHTML = "<font color='red'>Field is Required</font>";
                }
                if (age.length == 0) {
                    s3.innerHTML = "<font color='red'>Field is Required</font>";
                }
                if (password.length == 0) {
                    s4.innerHTML = "<font color='red'>Field is Required</font>";
                }
            } else if (name.length > 50 || email.length > 50 || password.length > 50) {
                if (name.length > 50) {
                    s5.innerHTML = "<font color='red'>Characters should be less than 50 </font>";
                }
                if (email.length > 50) {
                    s6.innerHTML = "<font color='red'>Characters should be less than 50 </font>";
                }
                if (password.length > 50) {
                    s7.innerHTML = "<font color='red'>Characters should be less than 50 </font>";
                }
            } else {
                document.f1.submit();
            }
        }
    </script>
</head>
<body>
    <table cellpadding='3' cellspacing='3' class='tab_main'>
        <!-- Logo -->
        <tr>
            <td colspan='5'><img src='images/logo.png' height='65%' width='100%'></td>
        </tr>
        <!-- Nav Tabs -->
        <tr align='center' bgcolor='lightgrey' class='td_bor'>
            <td width='5%'><a href='home.php'><button>Home</button></a></td>
            <td width='5%'><a href='login.php'><button>Login</button></a></td>
            <td width='5%'><a href='secure_signup.php'><button class="selected">Sign-up</button></a></td>
            <td width='5%'><a href='contact-us.html'><button>Contact-Us</button></a></td>
            <td width='5%'><a href='about-us.html'><button>About-Us</button></a></td>
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
                <form method='POST' name='f1' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
                    <table>
                        <tr>
                            <td> Name:- </td>
                            <td> <input type='text' name='n1' maxlength='50'> </td>
                            <td> <span id='s1'> </span> </td>
                            <td> <span id='s5'> </span> </td>
                        </tr>
                        <tr>
                            <td> Email:- </td>
                            <td> <input type='email' name='e1' maxlength='50'> </td>
                            <td> <span id='s2'> </span> </td>
                            <td> <span id='s6'> </span> </td>
                        </tr>
                        <tr>
                            <td> Age:- </td>
                            <td> <input type='number' name='a1' min='18' max='27'> </td>
                            <td> <span id='s3'> </span> </td>
                        </tr>
                        <tr>
                            <td> Gender:- </td>
                            <td> <select name='g1'>
                                <option value='M'>Male
                                <option value='F'>Female
                            </select> </td>
                        </tr>
                        <tr>
                            <td> Password:- </td>
                            <td> <input type='password' name='p1' maxlength='50'> </td>
                            <td> <span id='s4'> </span> </td>
                            <td> <span id='s7'> </span> </td>
                        </tr>
                        <tr>
                            <td> <br> <input type='button' value='Sign-up' name='s1' onclick='sec()'> </td>
                            <td> <br> OR <a href='login.php'>Login</a></td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            function sec($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $name = sec($_POST["n1"]);
            $email = sec($_POST["e1"]);
            $age = sec($_POST["a1"]);
            $gender = sec($_POST["g1"]);
            $password = sec($_POST["p1"]);

            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Connect to the database
            $resid = mysqli_connect('localhost', 'swill737', 'swill737', 'swill737');
            if (mysqli_connect_errno()) {
                echo "<tr align='center'> <td colspan='5'> Failed to connect to MySQL: " . mysqli_connect_error() . " </td> </tr>";
            } else {
                $stmt = $resid->prepare("SELECT name FROM students WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    echo "<tr align='center'> <td colspan='5'> <font color='red'> Email already Registered, Registration Failed! </font> </td> </tr>";
                } else {
                    $count_result = mysqli_query($resid, "SELECT (MAX(id) + 1) AS count FROM students");
                    $count_id = mysqli_fetch_assoc($count_result);
                    $new_id = $count_id['count'] ? $count_id['count'] : 1;

                    $stmt = $resid->prepare("INSERT INTO students (id, name, email, age, gender, password) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ississ", $new_id, $name, $email, $age, $gender, $hashedPassword);
                    $result = $stmt->execute();
                    if ($result) {
                        echo "<tr align='center'> <td colspan='5'> <font color='green'> Registration Successful! </font> You may login now from here:- <a href='login.php'>Login</a></td> </tr>";
                    } else {
                        echo "<tr align='center'> <td colspan='5'> <font color='red'> Registration Failed! </font> </td> </tr>";
                    }
                }
                $stmt->close();
                mysqli_close($resid);
            }
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
