<?php
	require "Config.php";

	if(isset($_POST['update']))
	{
			if($_POST['update']!=''){

			$name=$_POST['name'];
			$pass_photo=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
			$st_id=$_POST['st_id'];
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
			$sql="UPDATE admission_table SET name='$name',dob='$dob',sex='$sex',nationality='$nationality',category='$cat',religion='$religion',st_domicile='$domicile',email_id='$email',contact_no='$contact',M_instruction='$medium_instruction',father_name='$father_name',mother_name='$mother_name',parent_contact='$parent_contact',comm_add='$comm_address',per_add='$per_address' WHERE st_id=$st_id ";
			$result=mysql_query($sql,$connect);
			if($result){
				echo '<script>alert("Update Successfully")</script>';
			}
			else{
				echo '<script>alert("Update Failed")</script>'.mysql_error();
			}
		}
	}
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
	<title>Form Update</title>
</head>
<link rel="stylesheet" type="text/css" href="css\style.css">
<script src="js/jquery.min.js" type="text/javascript"></script>
<body>
<img src="image/sclogo1.png" style="width: 130px;height: 110px;float: left;padding: 20px 20px 20px;"> 
<img src="image/form.png" style="width: 130px;height: 120px;float: right;padding: 20px 20px 20px;">
<center><h2>
	<font size="50" style="text-shadow: 0 3px 0 darkred;font-size: 40px;text-align: center;padding-top: 20px;color:orange">SHILLONG COLLEGE</font>  <br>BOYCE ROAD <br>LAITUMKHRAH,SHILLONG-793003</h2>
<h5>Assesed and Re-Accredited in 2016 by NAAC as "A" Grade with CGPA:3.06</h5></center>
	<div style="background-color: purple;height: 40px"><h2 style="color:white;font-size:40px;font-family: arial;text-align: center">UPDATE FORM</div>
<form method="POST" enctype="multipart/form-data" action="update.php">
	<table><input type="text" name="st_id" value=<?php echo $id;?> style="display:none"/>
		<!-- <tr><td>Upload Passport Photo(max 50kb)<td><input type="file" name="image" id="image" style="width: 200px" /></td>
		</tr> -->
		<tr>
			<td>Name in Full(Mr/Mrs)(In block Letter)</td><td><input type="text"  value='<?php echo $row['name']; ?>'  name="name" placeholder="Full Name" required="true"></td>
		</tr>
		<tr>
			<td>Date of Birth</td><td><input type="date"  value=<?php echo $row['dob']; ?> name="dob" required="true"></td>
		</tr>
		<tr>
			<td>Sex</td><td>Male<input type="radio" name="sex" value="M" <?php if($row['sex']=='M'){
				echo 'checked';
			}?> required="true">&nbsp Female
				<input type="radio" name="sex" value="F"  <?php if($row['sex']=='F'){
				echo 'checked';
			}?> required="true"></td>
		</tr>
		
		<tr>
			<td>Nationality</td><td><input type="text" name="nationality" value=<?php echo $row['nationality']; ?>  placeholder="eg.(Indian,American....etc)" required="true"></td>
		</tr>
		<tr>
			<td>Category(ST/SC/OBC/Gen/Others)</td><td>ST<input type="radio" name="cat" value="ST" <?php if($row['category']=='ST'){
				echo 'checked';
			}?> required="true">&nbsp SC<input type="radio" name="cat" value="SC" <?php if($row['category']=='SC'){
				echo 'checked';
			}?> required="true">
													&nbsp OBC<input type="radio" name="cat" value="OBC" <?php if($row['category']=='OBC'){
				echo 'checked';
			}?> required="true">&nbsp Gen<input type="radio" name="cat" value="Gen" <?php if($row['category']=='Gen'){
				echo 'checked';
			}?> required="true">
													&nbsp Others<input type="radio" name="cat" value="Others" <?php if($row['category']=='Others'){
				echo 'checked';
			}?> required="true"></td>
		</tr>
		<tr>
			<td>Religion</td><td><input type="text" name="religion" value='<?php echo $row['religion']; ?>'  placeholder="Religion" required="true"></td>
		</tr>
		<tr>
			<td>State of Domicile</td><td><input type="text" name="domicile" value='<?php echo $row['st_domicile']; ?>'  placeholder="State of Domicile" required="true"></td>
		</tr>
		<tr>
			<td>Email-ID</td><td><input type="text" name="email" value='<?php echo $row['email_id']; ?>'  placeholder="Email-ID" required="true"></td>
		</tr>
		<tr>
			<td>Contact No/Mobile No:</td><td><input type="text" name="contact"  value='<?php echo $row['contact_no']; ?>' placeholder="Contact No" required="true"></td>
		</tr>
		<tr>
			<td>Medium Of Instruction</td><td><input type="text" name="medium_instruction"  value='<?php echo $row['M_instruction']; ?>' placeholder="Medium Of Instruction" required="true"></td>
		</tr>
		<tr>
			<td>Father's Name</td><td><input type="text" name="father_name"  value='<?php echo $row['father_name']; ?>'  placeholder="Father Name" required="true"></td>
		</tr>
		<tr>
			<td>Mother's Name</td><td><input type="text" name="mother_name" value='<?php echo $row['mother_name']; ?>'  placeholder="Mother Name" required="true"></td>
		</tr>
		<tr>
			<td>Guardian/Parent Contact no:</td><td><input type="text" name="parent_contact"  value='<?php echo $row['parent_contact']; ?>' placeholder="Parent Contact No" required="true"></td>
		</tr>
		<tr>
			<td>Communication Address</td><td><textarea name="comm_address" id="comm_address"><?php echo $row['comm_add']; ?></textarea></td>
		</tr>
		<tr>
			<td><input type="checkbox" name="fill_perm_address" id="fill_perm_address">Check here if address is same as above</td><td></td>
		</tr>
		
		<tr>
			<td>Permanent Address</td><td><textarea name="per_address" id="per_address" required="true"><?php echo $row['per_add']; ?></textarea></td>
		</tr>
	</table>
<center><input type="submit" name="update" value="Update" id="update" class="btn-pri"></center>
<div></div><div></div><div></div>
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
 ?>
</body>
</html>
<script>
	$(document).ready(function(){
		// $('#update').click(function(){
		// 	var image_name=$('#image').val();
		// 	if(image_name==''){
		// 		alert("Please Provide Passport Photo");
		// 		return false;
		// 	} 
		// 	else
		// 	{
		// 		var extention=$('#image').val().split('.').pop().toLowerCase();
		// 		if(jQuery.inArray(extention, ['gif','png','jpg','jpeg'])== -1){
		// 			alert('Invalid Image File for Passport Photo');
		// 			$('#image').val('');
		// 			return false;
		// 		}
		// 	}
		// });

		$('#fill_perm_address').click(function(){
			$('#per_address').val($('#comm_address').val());
		});

	});
</script>
