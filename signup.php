
<?php
include 'db_connect.php'; // Include your database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from form
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Using the plain text password

    // SQL query to insert data into the users table
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    try {
        // Try to execute the query
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
    } catch (mysqli_sql_exception $e) {
        // Catch the exception
        if ($conn->errno == 1062) {
            echo "A user with this email already exists. Please login.";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $conn->close();
}
?>
 <?php
$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = ""; // default password for XAMPP is blank
$dbname = "myproj"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>