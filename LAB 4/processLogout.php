
<?php
session_start();
require_once('connection.php');
if(isset($_SESSION['User'])){

    $user = new User();
    echo $user->logout($pdo);    
    unset($_POST);
}
else{

	echo '<script>alert("You are not logged in!")</script>'; 
	
}

?>