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
  public function Register($full_name, $username, $email,  $password)
  {
    try {
      $db = DataBase();
      $sql = "INSERT INTO users(FullName, UserName, Email, Password) VALUES (:fname,:uname,:email,:pass)";
      $query = $db->prepare($sql);
      $query->bindParam("fname", $full_name, PDO::PARAM_STR);
      $query->bindParam("uname", $username, PDO::PARAM_STR);
      $query->bindParam("email", $email, PDO::PARAM_STR);
      $enc_password = password_hash($password, PASSWORD_DEFAULT);
      $query->bindParam("pass", $enc_password, PDO::PARAM_STR);
      $query->execute();
      return $db->lastInsertId();
    } catch (PDOException $e) {
      exit($e->getMessage());
    }
  }
  public function greetingWord()
  {
    date_default_timezone_set('Asia/Jakarta');
    $hour = date("G");

    if ($hour > 0 && $hour < 24) {
      if ($hour >= 0 && $hour < 6) {
        echo "<p>Morning sunshine 🌞 <b> <br> Good Luck for Today🤗 <b></p>";
      } else if ($hour >= 6 && $hour < 12) {
        echo "<p>Good Morning. Have a nice day 🤙 </p>";
      } else if ($hour >= 12 && $hour < 17) {
        echo "<p>Good Afternoon. Good Job guys 👍 </p>";
      } else {
        echo "<p>Good evening. Have a nice dream tho 💤 </p>";
      }
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
      $sql = "SELECT username, password FROM users WHERE username=:username";
      $query = $db->prepare($sql);
      $query->bindParam("username", $username, PDO::PARAM_STR);
      $query->execute();
      $results = $query->fetchAll(PDO::FETCH_OBJ);
      if ($query->rowCount() > 0) {
        foreach ($results as $row) {
          $hashpass = $row->Password;
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
      $query = $db->prepare("SELECT id FROM users WHERE email=:email");
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
   * get User Details
   *
   * @param $user_id
   * @return $mixed
   * */
  public function UserDetails($user_id)
  {
    try {
      $db = DataBase();
      $query = $db->prepare("SELECT id, username, Email FROM users WHERE id=:id");
      $query->bindParam("id", $id, PDO::PARAM_STR);
      $query->execute();
      if ($query->rowCount() > 0) {
        return $query->fetch(PDO::FETCH_OBJ);
      }
    } catch (PDOException $e) {
      exit($e->getMessage());
    }
  }

  //redirect to a specific page
  public function redirect_to($page)
  {
    header("location:$page");
  }
  //get the counting of items in a table
  public function get_count_from($table)
  {
    $dbh = Database();
    $sql = "SELECT id from $table";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $totalcount = $query->rowCount();
    if ($totalcount == 0) {
      echo 0;
    } else {
      echo $totalcount;
    }
  }
  public function is_user()
  {
    if (isset($_SESSION['userlogin']))
      return true;
  }
  public function valid_username($str)
  {
    return preg_match('/^[a-z0-9_-]{3,16}$/', $str);
  }

  public function valid_password($str)
  {
    return preg_match('/^[a-z0-9_-]{6,18}$/', $str);
  }
  // changing password starts here
  public function change_password()
  {
    $dbh = Database();
    if (isset($_POST['change_pass'])) {
      $currentpassword = htmlspecialchars($_POST['password']);
      $npass = htmlspecialchars($_POST['newpassword']);
      $username = $_SESSION['userlogin'];
      $sql = "SELECT Password FROM users WHERE UserName=:uname";
      $query = $dbh->prepare($sql);
      $query->bindParam(':uname', $username, PDO::PARAM_STR);
      $query->execute();
    }
  }
  public function get_user_profile($folder)
  {
    global $dbh;
    $sql = "SELECT * from users";
    $query = $dbh->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
    $cnt = 1;
    echo $folder . '/' . htmlentities($result->Picture);
  }
  public function logged_user()
  {
    echo htmlentities(ucfirst($_SESSION['userlogin']));
  }
}
