<?php
	$connect=@mysql_connect("localhost","root","");
	if(!$connect){die("connection Failed");}
	if(!mysql_select_db("student_info",$connect)) {die("Database not found");}

?>
