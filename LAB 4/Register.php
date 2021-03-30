<!DOCTYPE html>
<html>
<head>
  <title>Register Page</title>
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
            <p>Create Your Account Here <br> for Free</p>
            <p class="p">~  "Peace is from within"</p>
        </div>
    <div class="Register-box">
        <h1>Register</h1>

        <form id="formRegister" action="processRegister.php" method="POST" enctype="multipart/form-data">
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
 
        <input type="file" name="image" id="image" class="image">
        
        <br>
        <br>
        <button  class="Signbtn" type="submit" name="register" >Register</button>
        <a href="Login.php"><p class="p1">Already have an account?Login here</p></a>
        <p id="Message" style='color:red; margin-left: 39px;'></p>
        <div class="response" id="response">
                   
          </div>
    </div>
    
    </form>



    </div>
</div>
<script src="script.js"></script> 
</body>
</html>
