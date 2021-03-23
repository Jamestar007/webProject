<?php 
	require "Config.php";
	if(isset($_GET['st_id'])){
		if($_GET['st_id']!=''){
			$id=$_GET['st_id'];
			$sql="select * from admission_table where st_id=$id";
			$result=mysql_query($sql,$connect);
			if(mysql_num_rows($result) > 0){
			if($result){
				while($row=mysql_fetch_array($result)){
			?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Student Info</title>
 </head>
 <link rel="stylesheet" type="text/css" href="css\style.css">
 
 <img src="image/sclogo1.png" style="width: 130px;height: 110px;float: left;padding: 20px 20px 20px;"> 
 <?php
 	echo '<img src="data:image/jpeg;base64,'.base64_encode($row['pphoto']).'" style="width: 130px;height: 150px;float: right;padding: 20px 20px 20px;" /> ';
 ?>
<div style="background-color: purple;height: 40px"><h2 style="color:white;font-size:40px;font-family: arial;text-align: center">Student Details</div>
 <body>
 	<form>
 		<table>
						<tr><td>Name</td><td><?php echo $row['name'];?></td></tr>
						<tr><td></td><td></td></tr>
						<tr><td>Date Of Birth</td><td><?php echo $row['dob']; ?></td></tr>
						<tr><td></td><td></td></tr>
						<tr><td>Sex</td><td><?php if($row['sex']=='M')
							{ echo 'Male';} else echo 'Female'; ?></td></tr>
						<tr><td></td><td></td></tr>
						<tr><td>Nationality</td><td><?php echo $row['nationality']; ?></td></tr>
						<tr><td></td><td></td></tr>
						<tr><td>Category</td><td><?php echo $row['category']; ?></td></tr>
						<tr><td></td><td></td></tr>
						<tr><td>Religion</td><td><?php echo $row['religion']; ?></td></tr>
						<tr><td></td><td></td></tr>
						<tr><td>State Of Domicile</td><td><?php echo $row['st_domicile']; ?></td></tr>
						<tr><td></td><td></td></tr>
						<tr><td>Email</td><td><?php echo $row['email_id']; ?></td></tr>
						<tr><td></td><td></td></tr>
						<tr><td>Contact</td><td><?php echo $row['contact_no']; ?></td></tr>
						<tr><td></td><td></td></tr>
						<tr><td>Medium Of Instruction</td><td><?php echo $row['M_instruction']; ?></td></tr>
						<tr><td></td><td></td></tr>
						<tr><td>Father Name</td><td><?php echo $row['father_name']; ?></td></tr>
						<tr><td></td><td></td></tr>
						<tr><td>Mother Name</td><td><?php echo $row['mother_name']; ?></td></tr>
						<tr><td></td><td></td></tr>
						<tr><td>Parent/Guardian Contact No</td><td><?php echo $row['parent_contact']; ?></td></tr>
						<tr><td></td><td></td></tr>
						<tr><td>Communication Address</td><td><?php echo $row['comm_add']; ?></td></tr>
						<tr><td>Permanent Address</td><td><?php echo $row['per_add']; ?></td></tr>
					</table> 
					<a href="update.php?st_id=<?php echo $id; ?>">Edit</a>
 	</form>

<?php 
						}
				}
			}
			else{
				echo "<script>alert('No Data Found')</script>";
			}
		}	
	}
	else{
		header("location:VIEW_STUDENT.PHP");
	}
 ?>
 </body>
 </html>