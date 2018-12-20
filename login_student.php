<?php

ob_start();
$host="localhost";                                      // Host name 
$username="id7339064_sahanachaitra";                    // Mysql username 
$password="sahanachaitra";                              // Mysql password 
$db_name="id7339064_iiitdwdlibrary";                    // Database name 
$tbl_name="auth_student";                               // Table name 

// Connect to server and select databse.
$conn = mysqli_connect($host, $username, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();
$_SESSION['sid'] = $_POST['uname'];
// Define $myusername and $mypassword 
$myusername= mysqli_real_escape_string($conn, $_POST['uname']); 
$mypassword= mysqli_real_escape_string($conn, $_POST['psw']); 
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);


$query = "SELECT * FROM auth_student WHERE s_id='$myusername' and password='$mypassword'";
$result=mysqli_query($conn, $query);
$count=mysqli_num_rows($result);

if($count===1){
header('location: index_stud.html');
}
else {
 ?><script> alert("Wrong username or password"); window.history.back();</script><?php
           header('location: index.html');
}

ob_end_flush();
?>