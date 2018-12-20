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
$date1 = $_POST['date1'];
$date2 = $_POST['date2'];


 
if($bid !=''||$sid !=''||$date1!=''||$date2!='')
{
  //check if student id exists 
$dupesql = "select s_id from student where s_id = '$sid'";
$duperaw = mysqli_query($conn, $dupesql);
$checkrows=mysqli_num_rows($duperaw);
    if( $checkrows >0 ) {
            $book = "select b_id from issue where b_id ='$bid'";
            $dubook = mysqli_query($conn, $book);
            $checkbk =mysqli_num_rows($dubook);
            if($checkbk>0){
                ?><script> alert("Book already issued"); window.history.back();</script><?php
                            header('location: staff_window.html');
            }
            else{
                //check student 5 book issueability
                $dupsql = "select s_id from student where s_id = '$sid' and s_count<5";
                $dupraw = mysqli_query($conn, $dupsql);
                $checkrows=mysqli_num_rows($dupraw);
                if( $checkrows>0 ) {
                    $sql = "insert into issue (s_id,b_id,issue_date, return_date) values ('$sid', '$bid', '$date1', '$date2')";
                    $sql2 = "update student set s_count = s_count + 1 where s_id = '$sid'";
                    $sql3 = "update book set b_avail = b_avail-1 where b_id = '$bid'";
                    if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)){
                        ?><script> alert("issue successful"); window.history.back();</script><?php
                                header('location: staff_window.html');
                       }
                }
    
                else{
                     ?><script> alert("Student has issued more than 5 books"); window.history.back();</script><?php
                    header('location: staff_window.html');
                    }
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
