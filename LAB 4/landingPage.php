<!DOCTYPE html>
<html>

<head>
  <title>First Page</title>
  <link rel="stylesheet" type="text/css" href="Profile.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
  $(document).ready(function () {
    $("#formOrder").submit(function (event) {
        event.preventDefault();
        var foodName = $("input[name = 'foodName']").val();
        
        $.post("processOrder.php", {
            
            foodName: foodName
        },
            function (data, status) {
                $("#Message").html(data);

            });
    });
});</script>
</head>

<body>
  <nav>


    <ul class="nav-links">
      <p>Felix Zen</p>
      <img class="PP"src="Images/man.jpeg" alt="Profile">
      
      <button onclick="cPassword()"  class="cPassword" name="cPassword" type="submit">Change Password</button>
      <form id="#formLogout"action="processLogout.php" method="POST"></form>
      <button name="logout" class="logout" type="submit">Logout</button>
      
    </ul>
  </nav>

  <form action="processOrder.php" method="POST" id="formOrder">
  <br>
  <input type="text" placeholder="Enter food name" id="foodName" name="foodName">
  <br>
  <br>
  <br>
  <button class="order" name="order" type="submit" >Order</button>
  <p id="Message" style='color:red; margin-left: 39px;'></p>
  </form>

  <script>
  function cPassword() {

    return window.location.href='ChangePassword.php';
    
  }
  </script>

</body>

</html>