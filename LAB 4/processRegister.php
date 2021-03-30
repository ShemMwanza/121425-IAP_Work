<?php
include_once 'user.php';    
include_once 'db.php';    
$con = new DBConnector();    
$pdo = $con->connectToDB();

$uploadDir = 'Images/'; 

if(isset($_POST)){ 
    $fullName = $_POST['fullName'];        
    $email = $_POST['email'];        
    $password = $_POST['password'];
    $cor = $_POST['city'];
    
    if(!empty($fullName) && !empty($email) && !empty($password) && !empty($cor))
    { 
            $uploadStatus = 1;  
            $uploadedFile = ''; 
            if(!empty($_FILES["image"]["name"]))
            { 
                $fileName = basename($_FILES["image"]["name"]); 
                $targetFilePath = $uploadDir . $fileName; 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                 
                
                $allowTypes = array('jpg', 'png', 'jpeg'); 
                if(in_array($fileType, $allowTypes))
                { 
                     
                    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){ 
                        $uploadedFile = $fileName; 
                    }else
                    { 
                        $uploadStatus = 0; 
                        echo 'Please choose valid file'; 
                    } 
                }
                else
                { 
                    $uploadStatus = 0; 
                    echo 'Only JPG, JPEG, & PNG files are allowed to upload.'; 
                } 
            }     
            if($uploadStatus == 1){ 
                $user = new User();
                $user->setEmail($email);
                $user->setPassword($password);        
                $user->setFullName($fullName);  
                $user->setCityofResidence($cor);
                $user->setImage($uploadedFile); 
                $_SESSION["fullName"] =$_POST["fullName"];      
                echo $user->register($pdo);              
            } 
    }
    else{ 
        echo '<script>alert("Fill in all the remaining blanks!!")</script>';
    } 
} 

 
// Return response 


// if(isset($_FILES['file']['name'])){

//     /* Getting file name */
//     $filename = $_FILES['file']['name'];
 
//     /* Location */
//     $location = "Images/".$filename;
//     $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
//     $imageFileType = strtolower($imageFileType);
 
//     /* Valid extensions */
//     $valid_extensions = array("jpg","jpeg","png");
 
   
//     /* Check file extension */
//     if(in_array(strtolower($imageFileType), $valid_extensions)) {
//        /* Upload file */
//        if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
//         $user = new User();
//         $user->setImage($image);      
//     echo $user->register($pdo); 

//        }
//     }
 
    
    
//  }
 
?>