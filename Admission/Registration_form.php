<?php
	require "Config.php";
	if(isset($_POST['addmit']))
	{
		$maxid=1;
		if($_POST['addmit']!=''){
			
			$sql="select max(st_id) as max_sid from admission_table limit 1";
			$result=mysql_query($sql,$connect);
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_assoc($result)){
					$maxid=$row['max_sid'];
				}
				$maxid=$maxid+1;
			}
			$name=$_POST['name'];
			$pass_photo=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

			$dob=$_POST['dob'];
			$sex=$_POST['sex'];
			$nationality=$_POST['nationality'];
			$cat=$_POST['cat'];
			$religion=$_POST['religion'];
			$domicile=$_POST['domicile'];
			$email=$_POST['email'];
			$contact=$_POST['contact'];
			$medium_instruction=$_POST['medium_instruction'];
			$father_name=$_POST['father_name'];
			$mother_name=$_POST['mother_name'];
			$parent_contact=$_POST['parent_contact'];
			$comm_address=$_POST['comm_address'];
			$per_address=$_POST['per_address'];

			$sql="insert into admission_table values($maxid,'$name','$pass_photo','$dob','$sex','$nationality','$cat','$religion','$domicile','$email','$contact','$medium_instruction','$father_name','$mother_name','$parent_contact','$comm_address','$per_address')";
			$result=mysql_query($sql,$connect);
			if($result){
				echo '<script>alert("Form Applied Successfully")</script>';
			}
			else{
				echo '<center><font style="color : red;font-size:30px;">Invalid File Name or Image file size exceed 50 kb</font></center>';
			}

		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<link rel="stylesheet" type="text/css" href="css\style.css">
<script src="js/jquery.min.js" type="text/javascript"></script>
<body>
<img src="image/sclogo1.png" style="width: 130px;height: 110px;float: left;padding: 20px 20px 20px;"> 
<img src="image/form.png" style="width: 130px;height: 120px;float: right;padding: 20px 20px 20px;">
<center><h2>
	<font size="50" style="text-shadow: 0 3px 0 darkred;font-size: 40px;text-align: center;padding-top: 20px;color:orange">SHILLONG COLLEGE</font>  <br>BOYCE ROAD <br>LAITUMKHRAH,SHILLONG-793003</h2>
<h5>Assesed and Re-Accredited in 2016 by NAAC as "A" Grade with CGPA:3.06</h5></center>
	<div style="background-color: purple;height: 40px"><h2 style="color:white;font-size:40px;font-family: arial;text-align: center">REGISTRATION FORM</div>
<form method="POST" enctype="multipart/form-data">
	<table>
		<tr><td>Upload Passport Photo(max 50kb)<td><input type="file" name="image" id="image" style="width: 200px" /></td>
		</tr>
		<tr>
			<td>Name in Full(Mr/Mrs)(In block Letter)</td><td><input type="text" name="name" placeholder="Full Name" required="true"></td>
		</tr>
		<tr>
			<td>Date of Birth</td><td><input type="date" name="dob" required="true"></td>
		</tr>
		<tr>
			<td>Sex</td><td>Male<input type="radio" name="sex" value="M" required="true">&nbsp Female
				<input type="radio" name="sex" value="F" required="true"></td>
		</tr>
		
		<tr>
			<td>Nationality</td><td><input type="text" name="nationality" placeholder="eg.(Indian,American....etc)" required="true"></td>
		</tr>
		<tr>
			<td>Category(ST/SC/OBC/Gen/Others)</td><td>ST<input type="radio" name="cat" value="ST" required="true">&nbsp SC<input type="radio" name="cat" value="SC" required="true">
													&nbsp OBC<input type="radio" name="cat" value="OBC" required="true">&nbsp Gen<input type="radio" name="cat" value="Gen" required="true">
													&nbsp Others<input type="radio" name="cat" value="Others" required="true"></td>
		</tr>
		<tr>
			<td>Religion</td><td><input type="text" name="religion" placeholder="Religion" required="true"></td>
		</tr>
		<tr>
			<td>State of Domicile</td><td><input type="text" name="domicile" placeholder="State of Domicile" required="true"></td>
		</tr>
		<tr>
			<td>Email-ID</td><td><input type="text" name="email" placeholder="Email-ID" required="true"></td>
		</tr>
		<tr>
			<td>Contact No/Mobile No:</td><td><input type="text" name="contact" placeholder="Contact No" required="true"></td>
		</tr>
		<tr>
			<td>Medium Of Instruction</td><td><input type="text" name="medium_instruction" placeholder="Medium Of Instruction" required="true"></td>
		</tr>
		<tr>
			<td>Father's Name</td><td><input type="text" name="father_name" placeholder="Father Name" required="true"></td>
		</tr>
		<tr>
			<td>Mother's Name</td><td><input type="text" name="mother_name" placeholder="Mother Name" required="true"></td>
		</tr>
		<tr>
			<td>Guardian/Parent Contact no:</td><td><input type="text" name="parent_contact" placeholder="Parent Contact No" required="true"></td>
		</tr>
		<tr>
			<td>Communication Address</td><td><textarea name="comm_address" id="comm_address" placeholder="Communication Address"></textarea></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="fill_perm_address" id="fill_perm_address">Check here if address is same as above</td><td></td>
		</tr>
		
		<tr>
			<td>Permanent Address</td><td><textarea name="per_address" id="per_address" placeholder="Permanent Address" required="true"></textarea></td>
		</tr>
	</table>
<center><input type="submit" name="addmit" value="Submit" id="addmit" class="btn-pri"></center>
<div></div><div></div><div></div>
</form>
</body>
</html>
<script>
	$(document).ready(function(){
		$('#addmit').click(function(){
			var image_name=$('#image').val();
			if(image_name==''){
				alert("Please Provide Passport Photo");
				return false;
			} 
			else
			{
				var extention=$('#image').val().split('.').pop().toLowerCase();
				if(jQuery.inArray(extention, ['gif','png','jpg','jpeg'])== -1){
					alert('Invalid Image File for Passport Photo');
					$('#image').val('');
					return false;
				}
			}
		});

		$('#fill_perm_address').click(function(){
			$('#per_address').val($('#comm_address').val());
		});

	});
</script>
