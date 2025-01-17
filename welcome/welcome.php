<?php include 'header.php';

// Setup Var and set empty
$name = $email = "";

// Condition to detect form data and sanitize/trim/clean it
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = sanitize_inputs($_POST["name"]);
    $email = sanitize_inputs($_POST["email"]);
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

?>

    <div class="row">
        <div class="col">
            <p>Welcome <?php echo $name; ?>, your email address is <?php echo $email; ?>.</p>
        </div>
    </div>


<?php include 'footer.php'; ?>