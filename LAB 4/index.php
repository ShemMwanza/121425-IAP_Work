<?php    
include_once 'user.php';    
include_once 'db.php';    
$con = new DBConnector();    
$pdo = $con->connectToDB();       
if(isset($_POST['register']))
{        
    //register        
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

else if(isset($_POST['Login']))
{        
    //login        
    $email = $_POST['email'];        
    $password = $_POST['password'];        
    $user = new User();
    $user->setEmail($email);
    $user->setPassword($password);        
    echo $user->login($pdo);    
} 

else
{
    //change password
    // $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $user = new User();
    // $user->setEmail($email);
    $user->setPassword($password);
    $user->setPass1($password1);
    $user->setPass2($password2);
     
    echo $user->changePassword($pdo); 


}
?>