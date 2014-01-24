<?php  
	session_start();
	include('connect.php');
	
	$comment = $_GET['comment'];
	$replayid = $_GET['replayid'];
	$commentDate = date("F d, Y");
	$commentor = ucfirst($_SESSION['username']);
	mysql_query("INSERT INTO comments VALUES ('','$replayid','$commentor','$comment','$commentDate')") or die ($error);
	$id = mysql_insert_id();
	mysql_query("DELETE FROM notifications WHERE replayid='$replayid' AND userid !='$commentor'") or die ($error);
	echo $id;
?>  