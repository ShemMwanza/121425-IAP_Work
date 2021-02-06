<!DOCTYPE html>
<html>
<head>
  <title>Register Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="body">
        <div class="text">
            <p>Create Your Account Here <br> for Free</p>
            <p class="p">~  "Peace is from within"</p>
        </div>
    <div class="Register-box">
        <h1>Register</h1>

        <form action="processRegister.php" method="POST">
            <div class="form">
        <h2>Full name</h2>
        <input type="text" name="fullName" id="input" placeholder="John Doe" >
        <h2>Email</h2>
        <input type="text" name="email" id="input" placeholder="johndoe@example.com">
        <h2>Password</h2>
        <input type="password" name="password" id="input" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;">
        <h2>City of Residence</h2>
        <input type="text" name="city" id="input" placeholder="'Nairobi'">
        <h2>Image</h2>
        <input type="file" name="image" class="image">
        <br>
        <br>
        <button class="Signbtn" type="submit" name="register" >Register</button>
        <a href="Login.php"><p class="p1">Already have an account?Login here</p></a>
    </div>
    </form>



    </div>
</div>
</body>
</html>
