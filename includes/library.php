<?php
require __DIR__ . '/config.php';
/*
* Tutorial: PHP Login Registration system
*
* Page: Application library
* */

class AppLib
{

  /*
   * Register New User
   *
   * @param $name, $email, $username, $password
   * @return ID
   * */
  public function Register($full_name,$username, $email,  $password)
  {
      try {
          $db = DataBase();
          $sql = "INSERT INTO users(FullName, UserName, Email, Password) VALUES (:fname,:uname,:email,:pass)";
          $query = $db->prepare($sql);
          $query->bindParam("fname", $full_name, PDO::PARAM_STR);
          $query->bindParam("uname", $username, PDO::PARAM_STR);
          $query->bindParam("email", $email, PDO::PARAM_STR);
          $enc_password = password_hash($password,PASSWORD_DEFAULT);
          $query->bindParam("pass", $enc_password, PDO::PARAM_STR);
          $query->execute();
          return $db->lastInsertId();
      } catch (PDOException $e) {
          exit($e->getMessage());
      }
  }

  /*
   * Check Username
   *
   * @param $username
   * @return boolean
   * */
  public function isUsername($username)
  {
      try {
          $db = DataBase();
          $sql = "SELECT UserName,Password FROM users WHERE UserName=:username";
          $query = $db->prepare($sql);
          $query->bindParam("username", $username, PDO::PARAM_STR);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          if ($query->rowCount() > 0) {
            foreach ($results as $row) {
            $hashpass=$row->Password;
            }
              return true;
          } else {
              return false;
          }
      } catch (PDOException $e) {
          exit($e->getMessage());
      }
  }

  /*
   * Check Email
   *
   * @param $email
   * @return boolean
   * */
  public function isEmail($email)
  {
      try {
          $db = DataBase();
          $query = $db->prepare("SELECT id FROM users WHERE Email=:email");
          $query->bindParam("email", $email, PDO::PARAM_STR);
          $query->execute();
          if ($query->rowCount() > 0) {
              return true;
          } else {
              return false;
          }
      } catch (PDOException $e) {
          exit($e->getMessage());
      }
  }

  /*
       * Login
       *
       * @param $username, $password
       * @return $mixed
       * */

       /*
    * Login
    *
    * @param $username, $password
    * @return $mixed
    * */    public function Login($username, $password, $session)
   {
       try {
           $db = DataBase();
           $sql ="SELECT UserName,Password FROM users WHERE (UserName=:usname)";
           $query= $db -> prepare($sql);
           $query-> bindParam(':usname', $username, PDO::PARAM_STR);
           $query-> execute();
           $results=$query->fetchAll(PDO::FETCH_OBJ);
           if($query->rowCount() > 0)
           {
             foreach ($results as $row) {
               $hashpass=$row->Password;
             }
             //verifying Password
             if(password_verify($password, $hashpass)) {
                 $session=$username;
                 echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
               } else {
                 echo "<script>alert('You entered wrong password')</script>";

               }
           }
           //if username or email not found in database
           else{
              echo "<script>alert('User not registered with us')</script>";
           }
       } catch (PDOException $e) {
           exit($e->getMessage());
       }
   }

  /*
   * get User Details
   *
   * @param $user_id
   * @return $mixed
   * */
    public function UserDetails($user_id)
    {
        try {
            $db = DataBase();
            $query = $db->prepare("SELECT id, FullName, UserName, Email FROM users WHERE id=:user_id");
            $query->bindParam("user_id", $user_id, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    /*
     * Register New Contact
     *
     * @param $name, $email, $username, $password
     * @return ID
     * */
    public function Add_Contact($full_name, $email,  $occupation,$phone,$location)
    {
        try {
            $db = DataBase();
            $sql = "INSERT INTO users(FullName, Email, Occupation, Phone, Location) VALUES (:fname,:email,:job,:phone,:location)";
            $query = $db->prepare($sql);
            $query->bindParam("fname", $full_name, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("job", $occupation, PDO::PARAM_STR);
            $query->bindParam("phone", $phone, PDO::PARAM_STR);
            $query->bindParam("location", $location, PDO::PARAM_STR);
            $query->execute();
            return $db->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
  
    //redirect to a specific page
  	public function redirect_to($page){
  		header("location:$page");
  	}
    //get the counting of items in a table
    public function get_count_from($table){
          $dbh = Database();
  				$sql = "SELECT id from $table";
  				$query = $dbh->prepare($sql);
  				$query->execute();
  				$results = $query->fetchAll(PDO::FETCH_OBJ);
  				$totalcount = $query->rowCount();
  				if ($totalcount==0) {
  					echo 0;
  				}else{
  					echo $totalcount;
  				}
  	}
    public function is_user(){
      if (isset($_SESSION['userlogin']))
        return true;
    }
    public function valid_username($str){
      return preg_match('/^[a-z0-9_-]{3,16}$/', $str);
    }

    public function valid_password($str){
      return preg_match('/^[a-z0-9_-]{6,18}$/', $str);
    }
    // changing password starts here
  	public function change_password(){
      $dbh = Database();
  		if (isset($_POST['change_pass'])) {
  		$currentpassword=htmlspecialchars($_POST['password']);
  		$npass=htmlspecialchars($_POST['newpassword']);
  		$username=$_SESSION['userlogin'];
   		$sql ="SELECT Password FROM users WHERE UserName=:uname";
  		$query= $dbh -> prepare($sql);
  		$query-> bindParam(':uname', $username, PDO::PARAM_STR);
  		$query-> execute();
  		}
  }
  public function get_user_profile($folder){
    global $dbh;
    $sql = "SELECT * from users";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $result=$query->fetch(PDO::FETCH_OBJ);
    $cnt=1;
    echo $folder.'/'.htmlentities($result->Picture);
    
  }
  public function logged_user(){
    echo htmlentities(ucfirst($_SESSION['userlogin']));
  }
  public function set_company($name,$address,$country,$postal,$email,$phone){
    $dbh = Database();
    $sql = "INSERT INTO `Company` ( `Company`, `Address`, `Country`, `Postal_Code`, `Email`, `Phone`) VALUES (:company, :address, :country, :code, :email, :phone)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':company',$name,PDO::PARAM_STR);
    $query->bindParam(':address',$address,PDO::PARAM_STR);
    $query->bindParam(':country',$country,PDO::PARAM_STR);
    $query->bindParam(':code',$postal,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':phone',$phone,PDO::PARAM_STR);
    $query->execute();
    $lastInsert = $dbh->lastInsertId();
    if($lastInsert>0){
      echo "<script>alert('Company Settings Has Been Set');</script>";
      echo "<script>window.location.href='settings.php';</script>";
    }else{
      echo "<script>alert('Something Went Wrong.');</script>";
    }
    
  }

}

?>
