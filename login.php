<?php
session_start();
if(isset ($_SESSION['uid']))
{
	
		header('location:admin/admindash.php');
}
?>
<!DOCTYPE HTML>
<html lang="en_US">
<head><br><br>
	<title> ADMIN LOGIN </title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
	
</head>
<body>
<?php
include('header3.php');
?>
<br>
<br>
<br>
<h1 align="center">ADMIN LOGIN</h1>
<div class="container" style="width: 50%">
<form action="login.php" method="post">
<div class="form-group">
    <label>Username</label>
    <input type="text" name="uname" class="form-control" placeholder="Enter Username" required>
  	</div>
  	<div class="form-group">
    <label>Password</label>
    <input type="password" name="pass" class="form-control" placeholder="Enter Password" required>
  	</div>
<button type="submit" name="login" class="btn btn-primary">submit</button>
</form>
</div>
</body>
</html>

<?php
include('dbcon.php');
if(isset($_POST['login']))
{
	$username=$_POST['uname'];
	$password=$_POST['pass'];
	$qry="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password' ";
	$run=mysqli_query($con,$qry);
	$row=mysqli_num_rows($run);
	if($row<1)
	{
		?>
		<script>
		alert('Username or password not matched.');
		window.open('login.php','_self');
		</script>
		
		<?php
		
    }
	else
	{
		$data=mysqli_fetch_assoc($run);
		$id=$data['id'];
		
		
		$_SESSION['uid']=$id;
		header('location:admin/admindash.php');
		
	}
	
}

?>



