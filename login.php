<?php
include 'db_connect.php'; // Include your database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to find the user
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row['password']) {
            echo "Login successful";
            // Here, you can set session variables or redirect the user to another page
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with that email";
    }

    $conn->close();
}
?>