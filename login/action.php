<?php

// Setup Var and set empty
$user = $pass = "";

// Condition to detect form data and sanitize/trim/clean it
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = sanitize_inputs($_POST["user"]);
    $pass = sanitize_inputs($_POST["pass"]);
}

// Function to sanitize
function sanitize_inputs($data){
    //Trim data removes spaces at the beginning and end
    //there are other characters included in "spaces,"
    //ie tabs
    $data = trim($data);

    //Replaces slashes with the html counterpart, disabling it
    $data = stripslashes($data);

    //Makes the special characters in the html way, disabling
    $data = htmlspecialchars($data);

    // Allows the function to output the data
    return $data;
}

//  Values for mySQL connection
$servername = "localhost";
$username = "root";
$password = "password123!";
$dbname = "db_auth";

// Create the connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <br />";

// SQL Query to Retrieve Data
$sql = "SELECT * FROM login";

// Execute query
$result = mysqli_query($conn, $sql);

//Check if the query was successful
if (mysqli_num_rows($result) > 0) {
    //Output data
    while($row = mysqli_fetch_assoc($result)) {
        if($row["user"] === $user && $row["pass"] === $pass){
            echo "Login Successful";
        } else {
            echo "Login Failed";
        }
    }
} else {
    echo "0 Results";
}

?>