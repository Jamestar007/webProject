<?php 
	require "Config.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>View Student</title>
 </head>
 <link rel="stylesheet" href="css\style.css">
<script src="js/jquery.min.js" type="text/javascript"></script>
<div style="background-color: purple;height: 40px"><h2 style="color:white;font-size:40px;font-family: arial;text-align: center">Search Student Details</h2></div>
 <body>
 	<form>
 	<div style="font-size: 15px">
 	<input type="text" name="search" id="search" placeholder="Enter Student Name Here" required="">
 	<!-- <div id="studentlist"></div>
 	<input type="submit" name="fetch" id="fetch" value="Go" class="btn-pri" style="float: left;width: 50px"></td> -->
 	<div id="result"></div></div>
 </form>
 	
 </body>
 </html>
 <script>
 	$(document).ready(function(){
 		$('#search').keyup(function(){
 			var txt=$('#search').val();
 			if(txt!=''){
 				$.ajax({
 					url:"fetch.php",
 					method:"POST",
 					data:{txt:txt},
 					success:function(data){
 						$('#result').html(data);
 					}
 				});
 			}
 			else
 			{
 				$('#result').html('');
 			}
 		});
 		// 	$('#search').keyup(function(){
 	// 		var query=$(this).val();
 	// 		if(query!=''){
 	// 			$.ajax({
 	// 				url:"search.php",
 	// 				method:"POST",
 	// 				data:{query:query},
 	// 				success:function(data){
 	// 					$('#studentlist').fadeIn();
 	// 					$('#studentlist').html(data);
 	// 				}
 	// 			});
 	// 		}
 	// 	});
 	// $(document).on('click','li',function(){
 	// 	$('#search').val($(this).text());
 	// 	$('#studentlist').fadeOut();
 	// });
 	});
 </script>