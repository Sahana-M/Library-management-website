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
 
if(isset($_POST['submit'])){
$id = $_POST['id'];
    if($id !='')
    {
    $sql = "delete from book where b_id='$id'";
    $result = mysqli_query($conn, $sql);
        if($result = mysqli_query($conn, $sql)){
           ?><script> alert("deletion successful"); window.history.back();</script><?php
            header('location: staff_window.html');
        }
        else{
            ?><script> alert("b_id doesnt exist"); window.history.back();</script><?php
            header('location: staff_window.html');
        }
    }
    else{
            ?><script> alert("b_id  blank not filled"); window.history.back();</script><?php
            header('location: staff_window.html');
        }
   
}
mysqli_close($conn);

?>
