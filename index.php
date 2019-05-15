<!DOCTYPE HTML>

<?php
session_start();
		if(isset($_SESSION['ui']))
		{
			echo "";
		}
		else
		{
			header('location: first.php');
		}
?>

<html lang="en_US">
<head>
  <title> ALUMNI DATABASE MANAGEMENT SYSTEM </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style type="text/css">
    .jumbotron{
      background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.6)),url('2.jpg');
      background-size: cover;
      color: #ddd;
    }
  </style>
</head>
<body>
<?php
//include('header3.php');
include('header_admin2.php');
?>

<div class="jumbotron text-center">
  <h2>Welcome to Alumni Database Management System</h2> 
  <p>Alumni Information</p>
  <div class="container">
  <div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
  	<form method="post" action="index.php">
    <div class="form-group">
  <label for="sel1">Choose year of passing</label>
  <select class="form-control" name="year">
        <option>Choose Year Of Passing</option>  
   <option>2011</option>
    <option>2012</option>
    <option>2013</option>
    <option>2014</option>
    <option>2015</option>
    <option>2016</option>
    <option>2017</option>
	 <option>2018</option>
  </select>
</div>
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-danger" id="albtn">Submit</button>
      </div>
    </div>
  </form>
  </div> 
  <div class="col-md-4"></div>
  </div>
</div>
</div>
<div class="container">
<table class="table table-hover">
	<tr id="alumni">
	<th scope="col">Sno.</th>
	<th scope="col"> USN</th>
	<th scope="col">NAME</th>
	<th scope="col" width="15%">YEAR OF PASSING</th>
	<th scope="col">EMAIL ID</th>
	<th scope="col">CONTACT NUMBER</th>
  </tr>
  <?php
include('dbcon.php');
if(isset($_POST['submit']))
{
	$year = $_POST['year'];
	$sql = "SELECT * FROM alumni where YEAR='$year'";
	$res = mysqli_query($con,$sql);
	if(mysqli_num_rows($res)<1)
	 {
		
		echo"<tr><td colspan='6'>RECORD NOT FOUND</td></tr>";
	 }
	 else
	$cnt=1;
	
	
	while($data = mysqli_fetch_assoc($res)){?>
								<tr>
									<td><?php echo htmlentities($cnt); ?></th>
								  	<td><?php echo htmlentities($data['USN']); ?></td> 
									<td><?php echo htmlentities($data['NAME']); ?></td>
									<td><?php echo htmlentities($data['YEAR']); ?></td>
									<td><?php echo htmlentities($data['E_MAIL']); ?></td>
									<td><?php echo htmlentities($data['CONTACT_NO']); ?></td>
								</tr>
	<?php $cnt++; ?>

	
	
<?php }

}
	?>
</table>
<div>
</body>
</html>