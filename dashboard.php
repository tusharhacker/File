<?php
session_start();

if(isset($_SESSION['member_id']))
{
	echo "";
}
else
{
	header('location:login.php');
}

?>

<?php

if(isset($_POST['upload']))
{
	$con = mysqli_connect('localhost','root','','happy');
	
	$name = $_FILES['file']['name'];
	$temp = $_FILES['file']['tmp_name'];
	
	$success = move_uploaded_file($temp,"Video/$name");
	
}
?>

<style>
	#frmLogin {
		padding: 20px 60px;
		background: #B6E0FF;
		color: #555;
		display: inline-block;		
		border-radius: 4px;
	}
	input{
		font-size:20;
	}
	.field-group {
		margin-top:15px;
		margin-left:0px;
	}
	.input-field {
		padding: 8px;
		width: 200px;
		border: #A3C3E7 1px solid;
		border-radius: 4px;
	}
	.form-submit-button {
		background: #65C370;
		border: 0;
		padding: 8px 20px;
		border-radius: 4px;
		color: #FFF;
		text-transform: uppercase;
	}
	.form-submit-button2 {
		border: 0;
		padding: 8px 20px;
		border-radius: 4px;
		color: lightgreen; 
		text-transform: uppercase;
	}
	body{
		margin-top:2%;
		text-align:center;
		background-image:url(images/b2.jpg);
		background-size: cover;
	}
	.register{
		padding:40px;
		width:300px;
		height:120px;
		background-color:rgb(0,0,30,0.5);
		box-shadow:5px 5px 5px grey;
	}
	h1{
		font-size:100;
		height:10%;
		margin-bottom:8%;
		text-shadow:2px 2px 5px grey;
	}
	button
	{
		text-decoration:none;
		margin-left:90%;
		color:lightgreen;
		font-size:20;
		border: 0;
		padding: 8px 20px;
		border-radius: 4px;
		background-color:rgb(0,0,0,0.5);
	}
	a{
		text-decoration:none;
		color:lightgreen;
	}
</style>


<button> <a href="logout.php"> Logout </a></button>
<center>
<h1>Upload Video</h1>

<form method="post" action="" enctype="multipart/form-data">
<div class="register">
<div class="field-group">
<input class="form-submit-button2" type="file" name="file">
</div>
<div class="field-group">
<input class="form-submit-button" type="submit" name="upload" value="Upload">
</div>
</div>
</form>
</center>