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
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
    $qry = $_POST['query']; 
    
     
    $min_length = 3;
    
     
    if(strlen($query) >= $min_length){ 
         
        $qry = htmlspecialchars($qry); 
        
         
        $qry = mysql_real_escape_string($qry);
        
         
        $raw_results = mysql_query("SELECT * FROM book
            WHERE (`b_title` LIKE '%".$qry."%') OR (`b_author` LIKE '%".$qry."%')") or die(mysql_error());
             
         
        if(mysql_num_rows($raw_results) > 0){ 
             
            while($results = mysql_fetch_array($raw_results)){
            
                echo "<p><h3>".$results['b_title']."</h3>".$results['b_author']."</p>";
                
            }
             
        }
        else{ 
            echo "No results";
        }
         
    }
    else{
        echo "Minimum length is ".$min_length;
    }
?>
</body>
</html>
