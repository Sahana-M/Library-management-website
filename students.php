<?php
$servername = "localhost";
$username = "id7339064_sahanachaitra";
$password = "sahanachaitra";
$dbname = "id7339064_iiitdwdlibrary";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>

    
<html>
<head>
	<title>View all Books</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
	</style>
</head>
<body>
	<h1>Table 1</h1>
	<table class="data-table">
		<caption class="title">Students details</caption>
		<thead>
			<tr>
				<th>NO</th>
				<th>STUDENT ID</th>
				<th>FIRST NAME</th>
                <th>MIDDLE NAME </th>
                <th>LAST NAME </th>
                <th>BOOKS TAKEN</th>
				<th>EMAIL</th>
				<th>DOOR</th>
				<th>STREET</th>
				<th>CITY</th>
				<th>PINCODE</th>
			</tr>
		</thead>
		<tbody>

        <?php
        $sql = "SELECT * FROM student";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
                $no 	= 1;
                while ($row = $result->fetch_assoc())
                {

                    echo '<tr>
                            <td>'.$no.'</td>
                            <td>'.$row['s_id'].'</td>
                            <td>'.$row['s_fname'].'</td>
                            <td>'.$row['s_mname'].'</td>
                            <td>'.$row['s_lname'].'</td>
                            <td>'.$row['s_count'].'</td>
                            <td>'.$row['s_email'].'</td>
                            <td>'.$row['s_doorno'].'</td>
                            <td>'.$row['s_street'].'</td>
                            <td>'.$row['s_city'].'</td>
                            <td>'.$row['s_pincode'].'</td>
                            
                        </tr>';
                    $no++;
                }
        }
        

        $conn->close();
        ?>
		</tbody>
		<tfoot>
		</tfoot>
	</table>
</body>
</html>

