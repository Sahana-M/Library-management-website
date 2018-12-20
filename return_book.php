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

$bid = $_POST['bid'];
$sid = $_POST['sid'];
 
if($bid !=''||$sid !='')
{
  //check if student id exists 
$dupesql = "select s_id from student where s_id = '$sid'";
$duperaw = mysqli_query($conn, $dupesql);
$checkrows=mysqli_num_rows($duperaw);
    if( $checkrows >0 ) {
                $sql = "delete from issue where b_id = '$bid'";
                $sql2 = "update student set s_count = s_count - 1 where s_id = '$sid'";
                $sql3 = "update book set b_avail = b_avail + 1 where b_id = '$bid'";
                if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)){
                    ?><script> alert("Return successful"); window.history.back();</script><?php
                            header('location: staff_window.html');
                   }
            

            else{
                 ?><script> alert("Student has issued no such book"); window.history.back();</script><?php
                header('location: staff_window.html');
                }
            
       
    }     
   //--
    else{
         $error=TRUE;
        ?><script> alert("Student ID doesnt exist"); window.history.back();</script><?php
        header('location: book_insert.html');
    } 
 
}
else{
    ?><script> alert("Please fill empty fields"); window.history.back();</script><?php
                header('location: staff_window.html');
    }
}
mysqli_close($conn);

?>
