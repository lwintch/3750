<?php
require_once 'classes/Membership.php';
$membership = New Membership();
$membership->confirm_Member();
include_once 'header.php';
include 'connect.php';
//Upload Replay Script
if(isset($_FILES['replay'])){
	$file_name = $_FILES['replay']['name'];
	$cleanFileName = str_replace("\'", "", $file_name);
	$name = strip_tags($_POST['name']);
	$uploadedBy = strip_tags($_SESSION['username']);
	$errors = array();
	$allowed_ext = array('sc2replay', 'jpg');
	$file_ext = strtolower(end(explode('.', $file_name)));
	$file_size = $_FILES['replay']['size'];
	$file_tmp = $_FILES['replay']['tmp_name'];
	$location = 'http://www.spincentral.org/starcraft/replays/'.$cleanFileName;
	$replayDate = date("F d, Y");
	//Check to see if a title for the replay was entered
	if(empty($name)){
		$errors[] = 'You must enter a title for this replay';
	}
	//Check to see if a actual file was selected
	elseif(empty($file_name)){
		$errors[] = 'You need to select a replay to upload silly!';
	}
	elseif(strlen($name)>70){
		$errors[] = 'Your title is too long!';
	}
	//Check to see if file extension matches accepted extensions
	elseif (in_array($file_ext, $allowed_ext) === false){
		$errors[] = 'File extension not allowed';
	}
	//Check to see if the file size exceeds 2mb in size
	elseif ($file_size > 2097152) {
		$errors[] = 'File size must be 2mb or lower';
	}
	//If no errors then upload file
	if (empty($errors) ) {
		if (move_uploaded_file($file_tmp, 'replays/'.$cleanFileName)) {
			$input = mysql_query("
			INSERT INTO replays VALUES ('','$name','$uploadedBy','$location','$replayDate')");
			?>
				<script type="text/javascript">
    			$('#notificationCenter').css('background-color', 'green').html("Your replay has been posted!").slideDown(200);
    			$('#replayTitle').val('');
  				$('#notificationCenter').delay(3000).slideUp(200);
				</script>
			<?php
		}			
	} else {
		//Echo out errors
		foreach($errors as $error) {
			?>
				<script type="text/javascript">
    			$('#notificationCenter').css('background-color', 'red').html('<?php echo $error; ?>').slideDown(200);
  				$('#notificationCenter').delay(3000).slideUp(200);
  				$('#submitReplayDiv').slideDown(500);
				</script>
			<?php
		}
	}
}
?>
<div id="content">
	<div id="topNavigation">
		<ul id="navItems">
			<li id="uploadReplay">Upload Replay</li>
			<li id="mumbleInfo">Voice Info</li>
			<li id="updates">Recent Updates</li>
			<li id="mumbleInfo"><a title="Click to logout" href='login.php?status=loggedout' />Logout</a></li>
		</ul>
		<div class="clearFix"></div>
	</div>
	<div class="navContent">
		<div id="mumbleInfoDiv" class="navItemContent">
			<p><strong>Server Name: </strong><span class="colored">DrunkenMumble</span></p>
			<p><strong>Server Address: </strong><span class="colored">vx21.commandchannel.com</span></p>
			<p><strong>Port: </strong><span class="colored">3936</span></p>
			<p><strong>Pass: </strong><span class="colored">ewoks</span></p>
		</div>
		<div id="uploadReplayDiv" class="navItemContent">
				<form action="" method="POST" enctype="multipart/form-data">
				<div class="formDiv">
					<p>Replay Title:</p>
					<input type="text" id="replayTitle" name="name" maxlength="70" style="width:425px;margin-right:10px;float:left;" value="<?php echo $name ?>">
					<div id="titleFeedbackDiv">&nbsp;</div>
					<div class="clearFix"></div>
					<p>Select Replay: </p>
					<input type="file" style="width:425px;" name="replay" class="file" /><br />	
					<input type="submit" class="btn btn-success btn-small" value="Upload" />			
				</div>
				</form>		
		</div>
		<div id="updatesDiv" class="navItemContent">
			<ul>
				<li>Added ability to edit existing comments</li>
				<li>Additional security added during login</li>
				<li>Increased comment character limit</li>
				<li>Linked Main SC2 logo to homepage</li>
				<li>Added register link to login screen</li>
			</ul>
		</div>
	</div>
	<table width="800px" align="left" border="0" cellspacing="0" cellpadding="0" style="margin:30px 0 10px 0;">
		<tr>
			<th style="width:477px;">Replay Title</th>
			<th style="width:150px;">Uploaded By</th>
			<th style="width:123px;">Date</th>
			<th style="width:50px;"><img id="toggleDownComments" style="margin-right:10px;" src="images/toggleDown.png" width="20px" height="20px" alt="Show all comments" title="Show all comments" border="0" /><img id="toggleUpComments" src="images/toggleUp.png" width="20px" height="20px" alt="Hide all comments" title="Hide all comments" border="0" /></a></th>
		</tr>
	</table>
	<?php
		$replayget = mysql_query("SELECT * FROM replays ORDER by id DESC LIMIT 0, 20") or die ("Unable to connect to replay table");
		//Check database for replays and display
		while($replayRow = mysql_fetch_assoc($replayget))
		{
			$replayID = $replayRow['id'];
			$userName = $_SESSION['username'];
			$notificationGet = mysql_query("SELECT * FROM notifications WHERE userid='$userName' AND replayid='$replayID'") or die ("Unable to connect to notifications table");
			$commentget = mysql_query("SELECT * FROM comments WHERE replayid='$replayID' ORDER by id ASC") or die ("Unable to connect to comments table");	
			echo"
			<table width='800px' align='left' border='0' cellspacing='0' cellpadding='0'>
				<tr>
					<td style='width=480px;'><a title='Click to download this replay' href='".$replayRow['location']."'>".$replayRow['name']."</a></td>
					<td style='width:130px;'>".ucfirst($replayRow['uploadedby'])."</td>
					<td style='width:140px;'>".$replayRow['date']."</td>";
					if(mysql_num_rows($notificationGet)==0){
						echo"<td style='width:50px;text-align:right;'><div id='commentNotification".$replayRow['id']."' class='commentNotification'><img class='newCommentBtn' id='".$replayRow['id']."' src='images/newComment.png' width='20px' height='20px' alt='' border='0' title='Click to view Comments or post a comment' /></div></td>";
					}
					else
					{
						echo "<td style='width:50px;text-align:right;'><div id='commentNotification".$replayRow['id']."' class='commentNotification'><img class='commentBtn' id='".$replayRow['id']."' src='images/comment.png' width='20px' height='20px' alt='' border='0' title='Click to view Comments or post a comment' /></div></td>";
					}
				echo "</tr>
			</table>
			<div>&nbsp;</div>";
			
			//Check for comments on replay and display 
			echo "<div class='commentsContainer' id='commentsContainer".$replayRow['id']."'>";
			if(mysql_num_rows($commentget)!=0){
				while($commentRow = mysql_fetch_assoc($commentget)){
					echo"
						<div class='commentsDiv' id='commentDiv".$commentRow['id']."'>
							<p class='userComment' style='margin:0 0 10px 0; float:left; color:#A8A100;'>".$commentRow['comentor']." - <span style='color:#4C4C4E;font-size:12px;'>".$commentRow['commentDate']."</span></p>";
							if($commentRow['comentor'] === ucfirst($_SESSION['username'])){					
							echo "<img class='deleteBtn' id='".$commentRow['id']."' src='images/delete.png' width='20px' height='20px' alt='' border='0' style='float:right;'/>";
							echo "<img class='editComment' id='".$commentRow['id']."' src='images/edit.png' width='20px' height='20px' alt='' border='0' style='float:right;'/>";

							}
							echo "<div class='clearFix'></div>
							<p id='commentText".$commentRow['id']."'>".$commentRow['comment']."</p>
							</div>";
				}
			}
			else
				echo "<div class='commentsDiv'></div>";
			echo"</div><div class='addCommentDiv' id='addCommentDiv".$replayRow['id']."'></span><textarea id='commentArea".$replayRow['id']."' maxlength='1500' id='".$replayRow['id']."' class='newCommentTextArea'></textarea><br /><div class='postCommentContainer'><div class='postCommentBtnContainer'><div id='postBtn".$replayRow['id']."' name='".ucfirst($_SESSION['username'])."' class='newCommentPosted btn btn-success btn-small'>Post Comment</div><div id='repostBtn".$replayRow['id']."' name='".ucfirst($_SESSION['username'])."' class='repostComment btn btn-success btn-small'>Repost Comment</div></div><div class='feedbackDiv' id='feedbackDiv".$replayRow['id']."'>&nbsp;</div><div class='clearFix'></div></div>
			</div>";
		}
		echo"</div>";
	?>
</div>
<script type="text/javascript" src="js/jfuncV1.0.js"></script>
<?php
	include_once 'footer.php';
?>
