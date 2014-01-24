<?php
	include('connect.php');
	$commentId = $_GET['id'];
		if($commentId){
			$error = "Problem connecting to database.  Please try again later.";
			mysql_query("DELETE FROM comments WHERE id='".$commentId."'") or die ($error);
			echo "success";
		}
		else{
			echo "Something went wrong while deleting your comment";
		}

