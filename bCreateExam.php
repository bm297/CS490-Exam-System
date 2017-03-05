<html>
<head>
	<title>Create Exam</title>
	<body>
		<?php

		//
		//		THIS PART ONLY FOR BACKEND. DO NOT TOUCH.
		//

		$capture = file_get_contents("php://input");
		$selection_array = explode(' ', $capture);

		// Create connection
		$conn = mysqli_connect("sql2.njit.edu", "bm297", "WY2X2ekF", "bm297");

		// Depends on the call.
		// Retrieve questions from database the return them to mCreateExam
		if($selection_array[0] != 'selected'){

			// Select table
			$tbl = "Question_bank";

			// Query
			$query = "select * from $tbl";

			// Execute the query
			$rows = mysqli_query($conn, $query);

			// Create a JSON array of DB Object
			$json = array();
			while($row = mysqli_fetch_assoc($rows)){
				$json[] = $row['Question'];
				$json[] = $row['Difficulty'];
			};

		// Returns JSON array of DB Object
			echo json_encode($json);

		// Store in database the instructor's selection of exam questions	
		} else{
			$tbl = "Exam_selection";
			for($i=0; $i<sizeof($selection_array); $i++){
				$query = "INSERT INTO $tbl (Selection) VALUES ('{$selection_array[$i]}')";
				mysqli_query($conn, $query);
			}
			echo 'Exam Created';
		}
	?>
</body>
</head>  
</html>
