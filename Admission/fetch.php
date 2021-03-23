<?php 
	require "config.php";
	$output='';
	$sql="SELECT * FROM admission_table Where name LIKE '%".$_POST['txt']."%'";
	$result=mysql_query($sql,$connect);
	if(mysql_num_rows($result) > 0){
		$output.='<h4 style="text-align:center;font-size:20px;font-family:"Bell MT";">Showing Result</h4>';
		$output.='<table>
					<tr>
						<th>Name</th>
					</tr>';
		while($row=mysql_fetch_assoc($result)){
			$output.='<tr>
						<td style="background-color:#eee;"><a href="Student_info.php?st_id='.$row['st_id'].'">'.$row['name'].'</a></td></tr>';
		}
	}
	else{
		echo "<div style='color:red;font-size:30px;text-align:center;margin:20px 20px'>Data Not Found</div>";
	}
	$output.="</table>";
	echo $output;
 ?>