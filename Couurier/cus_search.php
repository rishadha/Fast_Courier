<?php
// $con = mysqli_connect('localhost', 'root', '', 'fast_courier');

// if (isset($_POST['search_mobile'])) {
//     $search_mobile = $_POST['search_mobile'];
    
//     $sql = "SELECT * FROM `registration` WHERE `Mobile_No` = '$search_mobile'";
//     $result = mysqli_query($con, $sql);
    
//     if ($result && mysqli_num_rows($result) > 0) {
//         echo '<!DOCTYPE html>';
//         echo '<html>';
//         echo '<head>';
//         echo '<title>Update Customer Details</title>';
//         echo '<style>';
//         echo 'body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-image: url("backgroun3.jpg"); background-size: cover; background-repeat: no-repeat; }';
//         echo '.container { max-width: 800px; margin: 50px auto; background-color: rgba(255, 255, 255, 0.3); backdrop-filter: blur(10px); padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); }';
//         echo 'form { margin-top: 20px; }';
//         echo 'form label { font-weight: bold; }';
//         echo 'form .form-group { margin-bottom: 20px; }';
//         echo 'form input[type="text"], form input[type="email"], form input[type="tel"], form input[type="number"] { width: calc(100% - 25px); padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 10px; margin-right: 10px;}';
        
//         echo 'form .update-button[type="submit"] { padding: 10px 20px; background-color: #f72d7a; color: #fff; border: none; border-radius: 5px; cursor: pointer; }';
        
//         echo 'form .print-form { display: inline-block; margin-left: 10px; }'; 
//         echo 'form .print-button {  padding: 10px 20px; background-color: #f72d7a; color: #fff; border: none; border-radius: 5px; cursor: pointer; }';
//         echo '</style>';
//         echo '</head>';
//         echo '<body>';
//         echo '<div class="container">';

//         while ($row = mysqli_fetch_assoc($result)) {

//             echo '<form action="update.php" method="post">';

//             echo '<h1>Fast Courier Pvt Ltd</h1>';
//             echo '<div class="form-group">';
//             echo '<label for="fname">First Name:</label>'. $row['First_Name'] . '<br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Email:</label>' . $row['Email'] . '<br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Mobile No:</label>' . $row['Mobile_No'] . '<br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Reference No:</label>'. $row['Reference_No'] . '<br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Sender\'s Address:</label>'. $row['Senders_Address'] . '<br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Receiver\'s Address:</label>'. $row['Receivers_Address'] . '<br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Delivery Status:</label>' . $row['Delivery_Status'] . '<br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Items:</label>' . $row['Items'] . '<br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">NIC Number:</label>' . $row['NIC_Number'] . '<br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Amount:</label>' . $row['Amount'] . '<br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Parcel Description:</label>'. $row['Parcel_Description'] . '<br>';
//             echo '</div>';

//             echo '</form>';
//             echo '<input type="hidden" name="update_mobile" value="' . $row['Mobile_No'] . '">';
//             echo '</body>';
//             echo '</html>';
          
            

//         }
//     } else {
//         echo "No records found for the given mobile number.";
//     }
// }




class DatabaseConnection {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'fast_courier';
    protected $connection;

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection() {
        return $this->connection;
    }
}

class Customer {
    protected $connection;

    public function __construct(DatabaseConnection $db) {
        $this->connection = $db->getConnection();
    }

    public function searchByMobile($search_mobile) {
        $sql = "SELECT * FROM `registration` WHERE `Mobile_No` = '$search_mobile'";
        $result = $this->connection->query($sql);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}

class CustomerDetailsPage {
    public function displayDetails($customerData) {
        echo '<!DOCTYPE html>';
        echo '<html>';
        echo '<head>';
        echo '<title>Update Customer Details</title>';
        echo '<style>';
        // echo '/* Your CSS styles here */';
        echo 'body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-image: url("backgroun3.jpg"); background-size: cover; background-repeat: no-repeat; }';
        echo '.container { max-width: 800px; margin: 50px auto; background-color: rgba(255, 255, 255, 0.3); backdrop-filter: blur(10px); padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); }';
        echo 'form { margin-top: 20px; }';
        echo 'form label { font-weight: bold; }';
        echo 'form .form-group { margin-bottom: 20px; }';
        echo 'form input[type="text"], form input[type="email"], form input[type="tel"], form input[type="number"] { width: calc(100% - 25px); padding: 10px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 10px; margin-right: 10px;}';
        
        echo 'form .update-button[type="submit"] { padding: 10px 20px; background-color: #f72d7a; color: #fff; border: none; border-radius: 5px; cursor: pointer; }';
        
        echo 'form .print-form { display: inline-block; margin-left: 10px; }'; 
        echo 'form .print-button {  padding: 10px 20px; background-color: #f72d7a; color: #fff; border: none; border-radius: 5px; cursor: pointer; }';

        echo '</style>';
        echo '</head>';
        echo '<body>';
        echo '<div class="container">';
        
        echo '<form action="update.php" method="post">';
        echo '<h1>Fast Courier Pvt Ltd</h1>';

        foreach ($customerData as $key => $value) {
            echo '<div class="form-group">';
            echo '<label for="' . $key . '">' . $key . ':</label>' . $value . '<br>';
            echo '</div>';
        }

        echo '<input type="hidden" name="update_mobile" value="' . $customerData['Mobile_No'] . '">';
        // echo '<button class="update-button" type="submit">Update</button>';
        echo '</form>';

        echo '</div>';
        echo '</body>';
        echo '</html>';
    }

    public function displayNoRecordsFound() {
        echo "No records found for the given mobile number.";
    }
}

$db = new DatabaseConnection();
$customer = new Customer($db);
$detailsPage = new CustomerDetailsPage();

if (isset($_POST['search_mobile'])) {
    $search_mobile = $_POST['search_mobile'];
    $customerData = $customer->searchByMobile($search_mobile);

    if ($customerData) {
        $detailsPage->displayDetails($customerData);
    } else {
        $detailsPage->displayNoRecordsFound();
    }
}








?>
