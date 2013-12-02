<?php
//connect to the database so we can check, edit, or insert data to our users table
$con = mysql_connect('localhost', 'spincent_admin', 'Justhost!984') or die(mysql_error());
$db = mysql_select_db('spincent_school', $con) or die(mysql_error());

?>