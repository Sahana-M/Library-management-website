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
$title = $_POST['title'];
$edition = $_POST['edition'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$availability = $_POST['availability'];
if($id !=''||$title !='')
{
$sql = "update book set b_id='$id', b_title='$title', b_edition='$edition',b_author='$author',b_isbn='$isbn',b_avail='$availability' where b_id='$id'";

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
