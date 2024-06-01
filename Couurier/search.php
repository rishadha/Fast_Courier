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

//             echo '<div class="form-group">';
//             echo '<label for="fname">First Name:</label>';
//             echo '<input id="fname" type="text" name="fname" value="' . $row['First_Name'] . '"><br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Email:</label>';
//             echo '<input id="email" type="email" name="email" value="' . $row['Email'] . '"><br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Mobile No:</label>';
//             echo '<input id="number" type="tel" name="number" value="' . $row['Mobile_No'] . '"><br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Reference No:</label>';
//             echo '<input id="ref" type="number" name="Ref" value="' . $row['Reference_No'] . '"><br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Sender\'s Address:</label>';
//             echo '<input id="address" type="text" name="send_address" value="' . $row['Senders_Address'] . '"><br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Receiver\'s Address:</label>';
//             echo '<input id="address" type="text" name="rec_address" value=" ' . $row['Receivers_Address'] . '"><br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Delivery Status:</label>';
//             echo ' <input id="status" type="text" name="status" value=" ' . $row['Delivery_Status'] . '"><br>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Items:</label>';
//             echo '<input id="items"  type="text" name="items" value=" ' . $row['Items'] . '"><br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">NIC Number:</label>';
//             echo '<input id="nic"  type="text" name="nic" value="' . $row['NIC_Number'] . '"><br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Amount:</label>';
//             echo '<input id="amount" type="number" name="amount" value="' . $row['Amount'] . '"><br>';
//             echo '</div>';

//             echo '<div class="form-group">';
//             echo '<label for="fname">Parcel Description:</label>';
//             echo '<input id="description" type="text" name="descrip" value="' . $row['Parcel_Description'] . '"><br>';
//             echo '</div>';
        
//             echo '<input type="hidden" name="update_mobile" value="' . $row['Mobile_No'] . '">';
           
//             echo '<button type="submit" class="update-button">Update</button>';
//             echo '</form>';
//             // action="billprint.php" method="post"

//             echo '<form class="print-form" >';
//             echo '<button onclick="window.print()" type="submit" class="print-button">Print Bill  </button>';
//             echo '</form>';
            

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
            $customerData = [];
            while ($row = $result->fetch_assoc()) {
                $customerData[] = $row;
            }
            return $customerData;
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

        foreach ($customerData as $row) {
            echo '<form action="update.php" method="post">';
            echo '<h1>Fast Courier Pvt Ltd</h1>';
           $this->displayField('First Name', 'fname', $row['First_Name']);
            $this->displayField('Email', 'email', $row['Email']);
            $this->displayField('Mobile No', 'number', $row['Mobile_No']);
            $this->displayField('Reference No', 'ref', $row['Reference_No']);
            $this->displayField("Sender's Address", 'send_address', $row['Senders_Address']);
            $this->displayField("Receiver's Address", 'rec_address', $row['Receivers_Address']);
            $this->displayField('Delivery Status', 'status', $row['Delivery_status']);
            $this->displayField('Items', 'items', $row['Items']);
            $this->displayField('NIC Number', 'nic', $row['NIC_Number']);
            $this->displayField('Amount', 'amount', $row['Amount']);
            $this->displayField('Parcel Description', 'description', $row['Parcel_Description']);
            
            echo '<input type="hidden" name="update_mobile" value="' . $row['Mobile_No'] . '">';
            echo'<input type="hidden" name="Reference_No" value="' . $row['Reference_No'] . '">';
            echo '<button class="update-button" type="submit">Update</button>';
            echo '</form>';
            
            echo '<form class="print-form" action="billprint.php" method="post">';
            echo '<button onclick="window.print()" type="submit" class="print-button">Print Bill</button>';
            echo '</form>';
        }

        echo '</div>';
        echo '</body>';
        echo '</html>';
    }

    private function displayField($label, $id, $value) {
        echo '<div class="form-group">';
        echo '<label for="' . $id . '">' . $label . ':</label>';
        echo '<input id="' . $id . '" type="text" name="' . $id . '" value="' . $value . '"><br>';
        echo '</div>';
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















