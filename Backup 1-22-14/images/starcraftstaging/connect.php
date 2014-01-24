<?php
$error = "Problem connecting to database.  Please try again later.";

$connect = mysql_connect('localhost', 'spincent_admin', 'Justhost!984') or die ($error); 
mysql_select_db('spincent_replaystest') or die ($error);
?>