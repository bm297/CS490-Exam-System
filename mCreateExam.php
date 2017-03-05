<?php

// Fetch and Process Instructor's Selection for Database
$capture = file_get_contents("php://input");
$capture = explode("=", $capture);
$capture = str_replace("%24i&", '', $capture);
$capture = str_replace("selection", '', $capture);
$capture = str_replace("Submit", '', $capture);

// Retrieve Questions from Database OR sends selection to database
// depends on the call
if($capture[0] != 'selected'){
	$connection = curl_init();
	curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~bm297/CS490-Exam-System/bCreateExam.php");
	curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($connection);
	$db = json_encode($result);
	$d = json_decode($db, true);
	curl_close($connection);
	// Return the result as a string
	echo $result;
}else{
	// Convert array into a string
	$arr = implode(" ", $capture);
	$connection = curl_init();
	curl_setopt($connection, CURLOPT_URL, "https://web.njit.edu/~bm297/CS490-Exam-System/bCreateExam.php");
	curl_setopt($connection, CURLOPT_POSTFIELDS, $arr);
	curl_setopt($connection, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($connection, CURLOPT_RETURNTRANSFER, 0);
	$result = curl_exec($connection);
	curl_close($connection);

}
?>