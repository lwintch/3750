<?php 
	include 'header.php'; 
	require_once 'classes/users.php';
	$user = new User();

	$user->confirm_User();
?>
<div class="wrapper">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs">
	  <li><a href="#home" data-toggle="tab">Game Board</a></li>
	  <li><a href="#profile" data-toggle="tab">Edit Units</a></li>
	  <li><a href="#messages" data-toggle="tab">Score Board</a></li>
	  <li><a href="login.php?status=loggedout" >Logout</a></li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">
	  <div class="tab-pane active" id="home"><?php include 'gameBoard.php'; ?></div>
	  <div class="tab-pane" id="profile"><?php include 'editUnits.php'; ?></div>
	  <div class="tab-pane" id="messages"><?php include 'scoreBoard.php'; ?></div>
	  <div class="tab-pane" id="settings">...</div>
	</div>
</div><!--/container-->
<?php include 'footer.php' ?>