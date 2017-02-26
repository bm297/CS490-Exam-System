<html>
<head>
	<title>Create Exam</title>
	<body>
		<?php


//
//		THIS PART ONLY FOR BACKEND. DO NOT TOUCH.
//

// Create connection
$conn = mysqli_connect("sql2.njit.edu", "bm297", "WY2X2ekF", "bm297");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select table
$tbl = "Question_bank";

// Query
$query = "SELECT * from $tbl";

// Execute the query
$rows = mysqli_query($conn, $query);
echo $rows;


/*
		$conn = mysqli_connect("localhost", "cs288", "cs288pass");

		$db = mysqli_select_db($conn,"nyse");

		$tbl = "nyse_2016_11_30_14_40_22";

		$query = "select * from $tbl";

		$rows = mysqli_query($conn, $query);

	$cols = mysqli_num_fields($rows); # Returns 6

	echo "<table>";
	echo "<tr>";
	for($col = 0; $col<$cols; $col++){
		echo "<th>";
		$field = mysqli_fetch_field($rows);
		echo $field->name;
		echo "</th>";
	}

	while($elem = mysqli_fetch_array($rows)){
		echo "<tr>";
		for($i = 0; $i < $cols; $i++){
			echo "<td>$elem[$i] </td>";
		}
		echo "</tr>";
	}

	echo "</tr>";	
	echo "</table>";
*/

	?>
	</body>
</head>  
</html>
