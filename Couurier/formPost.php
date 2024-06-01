<?php

// $con= mySqli_connect('localhost','root','','fast_courier');

// $name= $_POST['fname'];
// $email= $_POST['email'];
// $mobile= $_POST['number'];
// $reference= $_POST['ref'];
// $sender_address= $_POST['send_address'];
// $receiver_address= $_POST['rec_address'];

// $delivery_status= $_POST['status'];
// $items= $_POST['items'];

// $nic_number= $_POST['nic'];
// $amount= $_POST['amount'];
// $description= $_POST['descrip'];

// $sql="INSERT INTO `registration`(`First_Name`, `Email`, `Mobile_No`, `Reference_No`, `Senders_Address`, `Receivers_Address`,`Delivery_status`, `Items`, `NIC_Number`, `Amount`, `Parcel_Description`) VALUES ('$name','$email','$mobile','$reference','$sender_address','$receiver_address','$delivery_status','$items','$nic_number','$amount','$description')";

// $rs= mySqli_query($con, $sql);
// if($rs){
//     echo "entries added";
// }

class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "fast_courier";
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
class Registration extends Database {
    public function __construct() {
        parent::__construct();
    }
    public function addEntry($data) {
        $conn = $this->getConnection();

        $name = $data['fname'];
        $email = $data['email'];
        $mobile = $data['number'];

        $maxID = 0;
        // Get the max ID from the database
        $sql = "SELECT MAX(Reference_No) AS maxID FROM `registration`;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Get the first row
            $row = $result->fetch_assoc();

            // Get the max ID
            $maxID = $row['maxID'];
        }
        // Generate the new reference number
        $newReferenceNumber = $maxID + 1;
        $reference = $newReferenceNumber;
        $senderAddress = $data['send_address'];
        $receiverAddress = $data['rec_address'];
        $deliveryStatus = $data['status'];
        $items = $data['items'];
        $nicNumber = $data['nic'];
        $amount = $data['amount'];
        $description = $data['descrip'];

        $sql = "INSERT INTO `registration`(`First_Name`, `Email`, `Mobile_No`, `Reference_No`, `Senders_Address`, `Receivers_Address`, `Delivery_status`, `Items`, `NIC_Number`, `Amount`, `Parcel_Description`) VALUES ('$name','$email','$mobile','$reference','$senderAddress','$receiverAddress','$deliveryStatus','$items','$nicNumber','$amount','$description')";

        $result = $conn->query($sql);
        if ($result) {
            echo "Entry added";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $registration = new Registration();
    $registration->addEntry($_POST);
}
?>