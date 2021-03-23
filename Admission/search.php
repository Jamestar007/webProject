<?php
	require "Config.php";
	if(isset($_POST['query'])){
		$output='';
		$query="SELECT *  FROM admission_table WHERE name LIKE '%".$_POST['query']."%'";
		$result=mysql_query($query,$connect);
		$output='<ul style="background-color:#eee;padding: 5px 10px;margin:0px 0px 0px">';
		if(mysql_num_rows($result) > 0){
			while ($row=mysql_fetch_assoc($result)) {
				$output.='<li style="list-style: none">'.$row['name'].'</li>';
			}
		}
		else{
			$output.='<li style="list-style: none">Student Not found</li>';
		}
		$output.='</ul>';
		echo $output;
	}
?>