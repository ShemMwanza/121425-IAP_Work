<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        .Register-box
        {
            height: 75vh;
        }
        #Message {
            color:red; 
            margin-left: 65px;
        }
    </style>

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

            <form id="formLogin" action="processLogin.php" method="POST" >
                <div class="form1">

                    <h2>Email</h2>
                    <input class="email" type="text" name="email" id="input" placeholder="johndoe@example.com">
                    <br><br>
                    <h2>Password</h2>
                    <input class="password" type="password" name="password" id="input" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;">

                    <br>

                    <button id="login" class="Signbtn" type="submit" name="Login">LOGIN</button>
                    <br>
                    <a href="Register.php"><p class="p1">Don't have an account?Register here</p></a>
                    <p id="Message" style='color:red; margin-left: 39px;'></p>
                </div>
            </form>



        </div>
    </div>
    <script src="script.js"></script> 
</body>

</html>