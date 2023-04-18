<?php



if (!empty($uname1) || !empty($upswd1) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "project";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

//if (mysqli_connect_error()){
  //die('Connect Error ('. mysqli_connect_errno() .') '
    //. mysqli_connect_error());
//}
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$uname1 = $_POST['uname1'];
$upswd1 = $_POST['upswd1'];

// Prepare the SQL query to retrieve the user record
$sql = "SELECT * FROM users WHERE uname='$uname' AND upswd1='$upswd1'";
$result = $conn->query($sql);

     // Check if there is a matching user record
if ($result->num_rows> 0) {
    // User found, set session variables and redirect to home page
    $_SESSION["uname1"] = $uname1;
    echo "success";
    header("Location: index.html");
} else {
    // No matching user record, display an error message and redirect to login page
    $_SESSION["error"] = "Invalid username or password. Please try again.";
    header("Location: login.html");
}

     $conn->close();
} 
?>
