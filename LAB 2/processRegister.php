<?php
include_once 'user.php';    
include_once 'db.php';    
$con = new DBConnector();    
$pdo = $con->connectToDB();       
if(isset($_POST['register']))
{                
    $fullName = $_POST['fullName'];        
    $email = $_POST['email'];        
    $password = $_POST['password'];
    $cor = $_POST['city'];
    $image = $_POST['image'];        
    $user = new User();
    $user->setEmail($email);
    $user->setPassword($password);        
    $user->setFullName($fullName);  
    $user->setCityofResidence($cor);
    $user->setImage($image);      
    echo $user->register($pdo);    
}
?>