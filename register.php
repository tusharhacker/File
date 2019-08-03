<?php
session_start();
?>
<style>
	#frmLogin {
		padding: 20px 60px;
		background: #B6E0FF;
		color: #555;
		display: inline-block;		
		border-radius: 4px;
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
	body{
		margin-top:13%;
		text-align:center;
		background-image:url(images/b2.jpg);
		background-size: cover;
	}
	.register{
		padding:20px;
		width:300px;
		height:260px;
		background-color:rgb(0,0,30,0.5);
		box-shadow:5px 5px 5px grey;
	}
</style>

	
		<center>
<form action="" method="post">
<div class="register">
	<div class="field-group">
		<div><input name="email" type="text" placeholder="email" class="input-field"></div>
	</div>
	<div class="field-group">
		<div><input name="member_name" type="text" placeholder="Username" class="input-field"></div>
	</div>
	<div class="field-group">
		<div><input name="member_password" type="password" placeholder="Password" class="input-field"></div> 
	</div>
	<div class="field-group">
		<div><input type="checkbox">
		<label> I accept Terms and Conditions </label>	
	</div>
	<div class="field-group">
		<div><input type="submit" name="register" value="Register" class="form-submit-button"></div>
	</div>       
</div>
</form>
</center>


<?php
		
		$con = mysqli_connect('localhost','root','','happy');
		
		if(isset($_POST['register']))
		{
			$username = $_POST['member_name'];
			$pass = $_POST['member_password'];
			$email = $_POST['email'];
			
			$q = "INSERT INTO members(member_name,member_password,member_email) VALUES('$username', '$pass', '$email')";
			$run = mysqli_query($con,$q);
			
			if($run)
			{
				header('location:login.php');
			}
			else
			{
				?>
				<script>
				alert('Unable to register !');
				header('location:register.php');
				</script>
				<?php
			}
		}
		?>