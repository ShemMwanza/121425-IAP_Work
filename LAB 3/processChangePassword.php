<?php
include_once 'user.php';    
include_once 'db.php';    
$con = new DBConnector();    
$pdo = $con->connectToDB();
if(isset($_POST))
{
    //change password
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $user = new User();
    $user->setEmail($email);
    $user->setPassword($password);
    $user->setPass1($password1);
    $user->setPass2($password2);
     
    echo $user->changePassword($pdo);
    unset($_POST); 


}
else
{ 
    echo "ERROR!!";
    
}
?>