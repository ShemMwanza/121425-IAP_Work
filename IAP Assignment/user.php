<?php

class User 
{
    //properties
    protected $email; 
    protected $password;  
    protected $fullName;
    protected $cor;
    protected $password1;
    protected $password2;
    protected $_SESSION;  
    //class constructor   
    function __construct($user, $pass)
    {    
        $this->email =$user; 
        $this->password = $pass;

    }
    //full name setter
    public function setFullName ($name)
    {
        $this->fullName = $name;
    }    
    //full name getter      
    public function getFullName ()
    {    
        return $this->fullName;   
    }
    //city name setter
    public function setCityofResidence($city)
    {
        $this->cor = $city;
    } 
    //city name getter
    public function getCityofResidence ()
    {
        return $this->cor;
    } 
    //image setter
    public function setImage($Image)
    {
        $this->image = $Image;
    } 
    //image getter
    public function getImage ()
    {
        return $this->image;
    }


    public function setPass1($password1)
    {
        $this->password1 = $password1;
    }

    public function getPass1()
    {
        return $this->password1;
    }

    public function setPass2($password2)
    {
        $this->password2 = $password2;
    }

    public function getPass2()
    {
        return $this->password2;
    }


      
    /**        
    * * Create a new user        
    * @param Object PDO Database connection handle        
    * @return String success or failure message        
    */ 
    public function register ($pdo)
    {
        $passwordHash = password_hash($this->password,PASSWORD_DEFAULT);
        try 
        {
            $stmt = $pdo->prepare ('INSERT INTO users (Fullname,Email,Password,CityofResidence,ProfilePhoto) VALUES(?,?,?,?,?)');
            $stmt->execute([$this->getFullName(),$this->email,$passwordHash,$this->getCityofResidence(),$this->getImage()]);
            return "Registration was successiful";
        } 
        catch (PDOException $e) 
        {            	
            return $e->getMessage();            
        }                    
    }        
    /**        
     * * Check if a user entered a correct username and password        
     * * @param Object PDO Database connection handle        
     * * @return String success or failure message        
     * */        
    public function login ($pdo)
    {            
        try 
        {   
            session_start();             
            $stmt = $pdo->prepare("SELECT Password FROM users WHERE Email=?");                
            $stmt->execute([$this->email]);                
            $row = $stmt->fetch();              
            if($row == null)
            {                	
                return "This account does not exist";                
            }                
            if (password_verify($this->password,$row['Password']))
            { 
                $_SESSION["User"] = $this->email;
                
                echo '<script>location.href="ChangePassword.php"</script>';               
            } 
            else
            {               
            return "Your username or password is not correct";
            } 
        } 
        catch (PDOException $e) 
        {            	
            return $e->getMessage();            
        }        
    }
    
    

    public function changePassword ($pdo)
    {
       try 
        {               
            $stmt = $pdo->prepare("SELECT Password FROM users where Email = ?");
            $stmt->execute([$this->email]);                 
            $row = $stmt->fetch();              
            if(empty($this->email) || empty($this->password) || empty($this->getPass1()) || empty($this->getPass2()))
            {
                  echo '<script>alert("Fill in the blanks")</script>';
                  echo '<script>location.href="ChangePassword.php"</script>';
            }
            if($this->password1 != $this->password2)
            {
                echo '<script>alert("New passwords do not match!")</script>'; 
            }   
            if (password_verify($this->password,$row['Password']))
            {   
                $passwordHash1 = password_hash($this->getPass1(),PASSWORD_DEFAULT);
                try 
                {
                    $stmt1 = $pdo->prepare ("UPDATE users set Password = '".$passwordHash1."' where Email = ?");
                    $stmt1->execute([$this->email]);
                    
                    echo '<script>alert("Password changed successsfully!!")</script>';
                    echo '<script>location.href="ChangePassword.php"</script>';
                } 
                catch (PDOException $e) 
                {            	
                    return $e->getMessage();            
                } 	
                               
            }
            else
            {
                return "Current Password is not Correct!!";

            }

            
        } 
        catch (PDOException $e) 
        {            	
            return $e->getMessage();            
        }                    
    }   
}



?>