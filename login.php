<?php
session_start();
if(!empty($_POST["login"])) {
	$conn = mysqli_connect("localhost", "root", "", "happy");
	$user = $_POST['member_name'];
	$pass = $_POST['member_password'];
	$sql = "Select *from members where member_name = '$user' and member_password = '$pass'";
	$result = mysqli_query($conn,$sql);
	$user = mysqli_fetch_array($result);
	if($user) {
			$_SESSION["member_id"]		   = $user["member_id"];
			
			if(!empty($_POST["remember"])) {
				setcookie ("member_login",$_POST["member_name"],time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("member_password",$_POST["member_password"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["member_login"])) {
					setcookie ("member_login","");
				}
				if(isset($_COOKIE["member_password"])) {
					setcookie ("member_password","");
				}
			}
			
			
	} else {
		$message = "Invalid Login";
	}
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
	.member-dashboard {
		padding: 40px;
		background: #D2EDD5;
		color: #555;
		border-radius: 4px;
		display: inline-block;
	}
	.member-dashboard a {
		color: #09F;
		text-decoration:none;
	}
	.error-message {
		text-align:center;
		color:#FF0000;
	}

	body{
		margin-top:13%;
		margin-right:5%;
		text-align:center;
		background-image:url(images/b3.gif);
		background-size: cover;
	}
	.login{
		padding:20px;
		width:300px;
		height:200px;
		background-color:rgb(255,120,30,0.5);
		box-shadow:5px 5px 5px grey;
	}
</style>


<?php if(empty($_SESSION["member_id"])) { ?>
<center>
<form action="" method="post">
<div class="login">
	<div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>	
	<div class="field-group">
		<div><input name="member_name" type="text" placeholder="Username" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" class="input-field">
	</div>
	<div class="field-group">
		<div><input name="member_password" type="password" placeholder="Password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" class="input-field"> 
	</div>
	<div class="field-group">
		<div><input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
		<label for="remember-me" style="color:white">Remember me</label>
	</div>
	<div class="field-group">
		<div><input type="submit" name="login" value="Login" class="form-submit-button"></span></div>
	</div>       
</div>
</form>
</center>
<?php } else { 
	header('location:dashboard.php');
} ?>