<?php
session_start();
if(isset ($_SESSION['ui']))
{
	
		header('location:index.php');
}
?>
<!DOCTYPE HTML>
<html lang="en_US">
<head>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<br>
<br>
	<title> STUDENT LOGIN </title>
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
<h1 align="center">STUDENT LOGIN</h1>
<div class="container" style="width: 50%">
<form action="student_login.php" method="post">
<div class="form-group">
    <label>Username</label>
    <input type="text" name="uname" class="form-control" placeholder="Enter Username" required>
  	</div>
  	<div class="form-group">
    <label>Password</label>
    <input type="password" name="pass" class="form-control" placeholder="Enter Password" required>
  	</div>
	 <div class="g-recaptcha" data-sitekey="6LdmNZ8UAAAAAOsKT1uhBm4dhoWnUZKghFl29mUK"></div>
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
	$qry="SELECT * FROM `student` WHERE `username`='$username' AND `password`='$password' ";
	$run=mysqli_query($con,$qry);
	$row=mysqli_num_rows($run);
	if($row<1)
	{
		?>
		<script>
		alert('Username or password not matched.');
		window.open('student_login.php','_self');
	
		</script>
		
		<?php
		
    }
	else
	{
		function CheckCaptcha($userResponse)
	{
        $fields_string = '';
        $fields = array(
            'secret' => '6LdmNZ8UAAAAAJ3H59svjNT2dRY8yEhza7OcBdFx' ,
            'response' => $userResponse
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
        $res = curl_exec($ch);
        curl_close($ch);
        return json_decode($res, true);
    }
    // Call the function CheckCaptcha
    $result = CheckCaptcha($_POST['g-recaptcha-response']);
    if ($result['success']) 
	{
        //If the user has checked the Captcha box
        echo "Captcha verified Successfully";
	header('location:student_login.php');
    }

	else {
			header('location:student_login.php');
        // If the CAPTCHA box wasn't checked
       echo '<script>alert("Error Message");</script>';
	    $data=mysqli_fetch_assoc($run);
		$id=$data['id'];
		
		
		$_SESSION['ui']=$id;
		header('location:student_login.php');
		
	  
    }
	
   }
   
		
	}
	


?>




    




