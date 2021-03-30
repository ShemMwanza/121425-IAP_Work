<?php    
include_once 'user.php';    
include_once 'db.php';    
$con = new DBConnector();    
$pdo = $con->connectToDB();
session_start();




if(isset($_POST))
{         
    $email = $_POST['email'];        
    $password = $_POST['password'];
    $user = new User();
    $user->setEmail($email);
    $user->setPassword($password); 
    echo $user->login($pdo);
    $_SESSION["email"] = $_POST["email"];      
    unset($_POST);

    
} 
else{ 
    echo "ERROR!!";
    
}
?>