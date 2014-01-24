<?php 
	include 'header.php'; 
	require_once 'classes/users.php';
	$user = new User();

	$user->confirm_User();
?>
<div class="wrapper">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs">
	  <li class="active"><a href="#home" data-toggle="tab">Game Board</a></li>
	  <li><a href="#units" data-toggle="tab">Edit Units</a></li>
	  <li><a href="#buildings" data-toggle="tab">Edit Buildings</a></li>
	  <li><a href="#scores" data-toggle="tab">Score Board</a></li>
	  <li><a href="login.php?status=loggedout" >Logout</a></li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">
	  <div class="tab-pane active" id="home"><?php include 'gameBoard.php'; ?></div>
	  <div class="tab-pane" id="units"><?php include 'editUnits.php'; ?></div>
	  <div class="tab-pane" id="buildings"><?php include 'editBuildings.php'; ?></div>
	  <div class="tab-pane" id="scores"><?php include 'scoreBoard.php'; ?></div>
	</div>
</div><!--/wrapper-->
<?php include 'footer.php' ?>