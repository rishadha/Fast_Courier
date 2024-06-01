<?php



// $host = "localhost";
// $user = "root";
// $password = "";
// $db = "fast_courier";


// //connection string
// $conn=new mysqli($host,$user,$password,$db);
// // Check connection
// if ($conn->connect_error) {
// die("Connection failed: " . $conn->connect_error);
// }
// else{
//     echo "Connected successfully";

// //get form input  data
// if ($_SERVER["REQUEST_METHOD"] == "POST") {

// $username = ( $_POST["username"]);
// $password=( $_POST["password"]);

// $query = "SELECT * FROM `login` WHERE username='$username' AND password='$password'";

// $result = $conn->query($query);

// if ($result->num_rows > 0) {
//   // Correct username and password
//   header("Location: Registration.php");
//   exit(0);
// } else {
//   // Incorrect username or password
//   echo "<script>alert('Incorrect username or password. Please try again.'); window.history.back();</script>";
// }


// }
// }



//oop concept code 


class Database
{
  private $host = "localhost";
  private $user = "root";
  private $password = "";
  private $db = "fast_courier";
  protected $conn;

  public function __construct()
  {
    $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);

    if ($this->conn->connect_error) {
      die("Connection failed: " . $this->conn->connect_error);
    }
  }
}
class Authentication extends Database
{
  public function authenticate($username, $password)
  {
    $query = "SELECT * FROM `login` WHERE username='$username' AND password='$password'";
    $result = $this->conn->query($query);

    if ($result->num_rows > 0) {
      // Correct username and password
      header("Location: Registration.php");
      exit(0);
    } else {
      // Incorrect username or password
      echo "<script>alert('Incorrect username or password. Please try again.'); window.history.back();</script>";
    }
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $auth = new Authentication();
  $auth->authenticate($username, $password);
}
