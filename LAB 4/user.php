<?php
Interface Account 
{
    public function register ($pdo);
    public function login($pdo);
    public function changePassword($pdo);
    public function logout ($pdo);
}
class User implements Account 
{
    //properties
    protected $email; 
    protected $password;  
    protected $fullName;
    protected $cor;
    protected $image;
    protected $password1;
    protected $password2;
    protected $_SESSION;  
    
    //email setter
    public function setEmail ($email)
    {
        $this->email = $email;
    }
    //email getter
    public function getEmail ()
    {    
        return $this->email;   
    }
    //password setter
    public function setPassword ($password)
    {
        $this->password = $password;
    }
    //password getter
    public function getPassword ()
    {    
        return $this->password;   
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
    public function setImage($image)
    {
        $this->image = $image;
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
        if(empty($this->getEmail()) || empty($this->getPassword()) || empty($this->getFullName()) || empty($this->getCityofResidence()) || empty($this->getImage())){
            return "Fill in all the blanks";
        }
        else
        {
            $passwordHash = password_hash($this->getPassword(),PASSWORD_DEFAULT);
            try 
            {
                $stmt = $pdo->prepare ('INSERT INTO users (Fullname,Email,Password,CityofResidence,ProfilePhoto) VALUES(?,?,?,?,?)');
                $stmt->execute([$this->getFullName(),$this->getEmail(),$passwordHash,$this->getCityofResidence(),$this->getImage()]);
                return "Registration was successiful";
            } 
            catch (PDOException $e) 
            {            	
                return $e->getMessage();            
            }
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
            if(empty($this->getEmail()) || empty($this->getPassword())){
                return "Fill in all the details";
            }
            else
            {   
                         
            $stmt = $pdo->prepare("SELECT Password FROM users WHERE Email=?");                
            $stmt->execute([$this->getEmail()]);                
            $row = $stmt->fetch();              
            if($row == null)
            {    
                return "This account is not found";                
            }                
            elseif (password_verify($this->getPassword(),$row['Password']))
            { 
                
                return "<script>window.location.href='landingPage.php'</script>";
              
                               
            } 
            else
            {
            return "Username or password is incorrect";
            }
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
            if(empty($this->getEmail())||empty($this->getPassword()) || empty($this->getPass1()) || empty($this->getPass2())){
                return "Fill in all the blanks!";
            }
            elseif($this->getPass1() != $this->getPass2()){
                return "New Passwords do not match!!";
            } 
            else{
                include_once 'processLogin.php';               
                $stmt = $pdo->prepare("SELECT Password FROM users where Email = ?");
                $stmt->execute([$this->getEmail()]);                 
                $row = $stmt->fetch();              
               
                 
                if (password_verify($this->getPassword(),$row['Password'])){   
                    $passwordHash1 = password_hash($this->getPass1(),PASSWORD_DEFAULT);
                    try{
                        $stmt1 = $pdo->prepare ("UPDATE users set Password = '".$passwordHash1."' where Email = ?");
                        $stmt1->execute([$this->getEmail()]);
                        
                        return '<script>alert("Password changed successsfully!!")</script>';
                        
                    } 
                    catch (PDOException $e){            	
                        return $e->getMessage();            
                    }              
                }
                else{
                    return "Current Password is not Correct!!";

                }
        }      
        } 
        catch (PDOException $e) 
        {            	
            return $e->getMessage();            
        }                    
    }

    
    

    public function logout ($pdo)
    {
       session_unset();
       session_destroy();
       return "<script>window.location.href='Login.php'</script>";
    }   
}



?>