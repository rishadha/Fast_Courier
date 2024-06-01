<?php
// $con = mysqli_connect('localhost', 'root', '', 'fast_courier');

// if (isset($_POST['update_mobile'])) {
//     $update_mobile = $_POST['update_mobile'];
//     $new_first_name = $_POST['fname'];
//     $new_email = $_POST['email'];
//     $new_number = $_POST['number'];
//     $new_ref = $_POST['Ref'];  // Corrected 'Ref' to 'Reference_No'
//     $new_send_address = $_POST['send_address'];
//     $new_rec_address = $_POST['rec_address'];
//     $new_status = $_POST['status'];
//     $new_items = $_POST['items'];
//     $new_nic = $_POST['nic'];
//     $new_amount = $_POST['amount'];
//     $new_description = $_POST['descrip'];

//     $sql = "UPDATE `registration` SET
//                 `First_Name`='$new_first_name',
//                 `Email`='$new_email',
//                 `Mobile_No`='$new_number',
//                 `Reference_No`='$new_ref',
//                 `Senders_Address`='$new_send_address',
//                 `Receivers_Address`='$new_rec_address',
//                 `Delivery_Status`='$new_status',
//                 `Items`='$new_items',
//                 `NIC_Number`='$new_nic',
//                 `Amount`='$new_amount',
//                 `Parcel_Description`='$new_description'
//             WHERE `Mobile_No`='$update_mobile'";

//     $result = mysqli_query($con, $sql);

//     if ($result) {
//         echo "Record updated successfully.";
//     } else {
//         echo "Error updating record: " . mysqli_error($con);
//     }
// }





// oop concept

class DatabaseConnection {
    protected $con;

    public function __construct($hostname, $username, $password, $dbname) {
        $this->con = mysqli_connect($hostname, $username, $password, $dbname);

        if (!$this->con) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function closeConnection() {
        mysqli_close($this->con);
    }
}

class Registration extends DatabaseConnection {

    public function __construct($hostname, $username, $password, $dbname) {
        parent::__construct($hostname, $username, $password, $dbname);
    }
    public function updateRecord(
        $updateMobile,
        $newFirstName,
        $newEmail,
        $newNumber,
        $newRef,
        $newSendAddress,
        $newRecAddress,
        $newStatus,
        $newItems,
        $newNIC,
        $newAmount,
        $newDescription
    ) {
        $sql = "UPDATE `registration` SET
                    `First_Name`='$newFirstName',
                    `Email`='$newEmail',
                    `Mobile_No`='$newNumber',
                    `Reference_No`='$newRef',
                    `Senders_Address`='$newSendAddress',
                    `Receivers_Address`='$newRecAddress',
                    `Delivery_Status`='$newStatus',
                    `Items`='$newItems',
                    `NIC_Number`='$newNIC',
                    `Amount`='$newAmount',
                    `Parcel_Description`='$newDescription'
                WHERE `Mobile_No`='$updateMobile'";

        $result = mysqli_query($this->con, $sql);

        if ($result) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . mysqli_error($this->con);
        }
    }
}

// Usage
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fast_courier';

$updateMobile = $_POST['update_mobile'];
$newFirstName = $_POST['fname'];
$newEmail = $_POST['email'];
$newNumber = $_POST['number'];
$newRef = $_POST['Reference_No'];  // Corrected 'Ref' to 'Reference_No'
$newSendAddress = $_POST['send_address'];
$newRecAddress = $_POST['rec_address'];
$newStatus = $_POST['status'];
$newItems = $_POST['items'];
$newNIC = $_POST['nic'];
$newAmount = $_POST['amount'];
$newDescription = $_POST['description'];

$registration = new Registration($hostname, $username, $password, $dbname);
$registration->updateRecord(
    $updateMobile,
    $newFirstName,
    $newEmail,
    $newNumber,
    $newRef,
    $newSendAddress,
    $newRecAddress,
    $newStatus,
    $newItems,
    $newNIC,
    $newAmount,
    $newDescription
);

$registration->closeConnection();



?>