<?php
session_start();
		if(isset($_SESSION['uid']))
		{
			echo "";
		}
		else
		{
			header('location: ../login.php');
		}
?>
<?php
include('header.php');
include('header_admin.php');

?>

<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<ul class="list-group">
			  <li class="list-group-item"><a href="addalumni.php">1 Insert Alumni Details</a></li>
			  <li class="list-group-item"><a href="updatealumni.php">2 Update Alumni Details</a></li>
			  <li class="list-group-item"><a href="deletealumni.php">3 Delete Alumni Details</a></li>
			   <li class="list-group-item"><a href="alumniinfo.php">4 Get Alumni Info</a></li>
     		</ul>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>
</body>
</html>

