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

if(isset($_POST['submit'])){

$id = $_POST['id'];
$title = $_POST['title'];
$edition = $_POST['edition'];
$author = $_POST['author'];
$isbn = $_POST['isbn'];
$availability = $_POST['availability'];


$error=FALSE;   
if($id !=''||$title !='')
{
$dupesql = "select b_id from book where b_id = '$id'";
$duperaw = mysqli_query($conn, $dupesql);
$checkrows=mysqli_num_rows($duperaw);
if( $checkrows>0 ) {
    $error=TRUE;
    ?><script> alert("b_id already exists"); window.history.back();</script><?php
    header('location: book_insert.html');
} 
    
else{
$sql = "insert into book (b_id,b_title,b_edition,b_author,b_isbn,b_avail) values ('$id', '$title', '$edition', '$author','$isbn','$availability')";

    if(mysqli_query($conn, $sql)){
        ?><script> alert("insertion successful"); window.history.back();</script><?php
                header('location: staff_window.html');
       }
}
}
else{
?><script> alert("Please fill empty fields"); window.history.back();</script><?php
            header('location: staff_window.html');
}
}
mysqli_close($conn);

?>
