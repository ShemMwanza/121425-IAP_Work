<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="body">
        <div class="text">
            <p>Login in to Your Account<br> Here </p>
            <p class="p">~ "You only die once"</p>
        </div>
        <div class="Register-box">
            
                <h1>Login</h1>
            
            <br>

            <form action="index.php" method="POST">
                <div class="form1">

                    <h2>Email</h2>
                    <input type="text" name="email" id="input" placeholder="johndoe@example.com">
                    <br><br>
                    <h2>Password</h2>
                    <input type="password" name="password" id="input" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;">

                    <br>

                    <button class="Signbtn" type="submit" name="Login">LOGIN</button>
                    <br>
                    <a href="Register.php"><p class="p1">Don't have an account?Register here</p></a>
                </div>
            </form>



        </div>
    </div>
</body>

</html>