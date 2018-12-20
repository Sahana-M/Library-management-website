<?php
$servername = "localhost";
$database = "id7339064_iiitdwdlibrary";
$username = "id7339064_sahanachaitra";
$password = "sahanachaitra";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) 
{
      die("Connection failed: " . mysqli_connect_error());
}

?>
<html>
<head>
	<title>Displaying MySQL Data in HTML Table</title>
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
		<caption class="title">Book ID search</caption>
		<thead>
			<tr>
                <th>BOOK ID</th>
				<th>TITLE</th>
				<th>AUTHOR</th>
                <th>EDITION</th>
				<th>ISSUE DATE</th>
				<th>RETURN DATE</th>
			</tr>
        </thead>
		<tbody>
		<?php
		session_start();
        $sid = $_SESSION['sid'];
            if($sid !='')
            {
                    $sql = "select b.b_id, b.b_title, b.b_author ,b.b_edition , i.issue_date, i.return_date from book b, issue i where i.b_id = b.b_id and i.s_id = '$sid'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) 
                    {
                   
                        while ($row = mysqli_fetch_assoc($result))
                        {
                                echo '<tr>
                                <td>'.$row['b_id'].'</td>
                                <td>'.$row['b_title'].'</td>
                                <td>'.$row['b_author'].'</td>
                                <td>'.$row['b_edition'].'</td>
                                <td>'.$row['issue_date'].'</td>
                                <td>'.$row['return_date'].'</td>
                                </tr>';
                        }
                    }
                    else
                    {
                         ?><script> alert("No books"); window.history.back();</script><?php
                        header('location: staff_window.html');
                    }
            }
               
            else {
                 ?><script> alert("b_id blank not filled"); window.history.back();</script><?php
                        header('location: staff_window.html');
            }
            mysqli_close($conn);

		?>
		</tbody>
		<tfoot>
		</tfoot>
	</table>
</body>
</html>
    