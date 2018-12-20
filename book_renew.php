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
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];


 
if($bid !=''||$date1!=''||$date2!='')
{
 //check student 5 book issueability
            $dupsql = "select b_id from issue where b_id = '$bid'";
            $dupraw = mysqli_query($conn, $dupsql);
            $checkrows=mysqli_num_rows($dupraw);
            if( $checkrows>0 ) {
                $sql = "update issue set issue_date ='$date1', return_date='$date2' where b_id ='$bid'";
                if(mysqli_query($conn, $sql)){
                    ?><script> alert("Renewal successful"); window.history.back();</script><?php
                            header('location: staff_window.html');
                   }
            

            else{
                 ?><script> alert("Renewal unsuccessful"); window.history.back();</script><?php
                header('location: staff_window.html');
                }
            
       
    }     
   //--
    else{
         $error=TRUE;
        ?><script> alert("Book ID doesnt exist"); window.history.back();</script><?php
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
