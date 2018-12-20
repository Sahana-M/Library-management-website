<?php
$servername = "localhost";
$database = "id7339064_iiitdwdlibrary";
$username = "id7339064_sahanachaitra";
$password = "sahanachaitra";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully"."<br>";
session_start();

if(isset($_POST['submit'])){
$sid = $_SESSION['sid'];
$fname = $_POST['s_fname'];
$mname = $_POST['s_mname'];
$lname = $_POST['s_lname'];
$email = $_POST['s_email'];
$doorno = $_POST['s_doorno'];
$street = $_POST['s_street'];
$city = $_POST['s_city'];
$pincode = $_POST['s_pincode'];
if($sid !=''||$email !='')
{
$sql = "update student set s_id='$sid', s_fname='$fname', s_mname='$mname',s_lname='$lname',s_email='$email',s_doorno='$doorno',s_street='$street',s_city='$city',s_pincode='$pincode' where s_id='$sid'";

if(mysqli_query($conn, $sql));
?><script> alert("Updation successful"); window.history.back();</script><?php
            header('location: staff_window.html');
}
else{
?><script> alert("Book ID doesnt exist or blanks are not filled"); window.history.back();</script><?php
            header('location: staff_window.html');
}
}
mysqli_close($conn);

?>
