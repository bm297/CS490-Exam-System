<html>
<head>
	<link rel="stylesheet" href="fWelcomeInst.css">
</head>
<body>

	<nav>
		<ul>
			<li><a href="fWelcomeInst.html">Home</a></li>
			<li><a href="fAddQuestion.html">Add Questions</a></li>
			<li><a href="fCreateExam.php">Create Exam</a></li>
			<li><a href="fGradeRelease.html">Release Grade</a></li>
			<li style="float:right"><a class="active" href="index.html">Log Out</a></li>
		</ul>
		<div class="handle">Menu</div>
	</nav>

	<?php
	// Retrieve Questions from Database
	$connection = curl_init();
	curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~bm297/CS490-Exam-System/mCreateExam.php");
	curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($connection);
	$db = json_encode($result);
	$d = json_decode($db, true);
	curl_close($connection);

	// Formatting Questions
	$s = explode(",", $d);
	$s = str_replace('"', '', $s);
	$s = str_replace('[', '', $s);
	$s = str_replace(']', '', $s);

	// Displaying Questions on Page
	// Sending Instructor's Selection to be Stored in Database

	echo '<form action="mCreateExam.php" method="post">';
	for($i=0; $i<sizeof($s); $i++){
		echo $s[$i];
		echo ' ';
		echo $s[$i+1];
		echo ' <input type="checkbox" name="selected" value=$i> Yes';
		echo '<br>';
		$i++;
	};
	echo '<input type="submit" name="selection" value="Submit">';
	
	?>
</body>
</html>