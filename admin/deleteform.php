<?php

 include('../dbcon.php');
$id=$_REQUEST['sid'];
	  $qry="DELETE FROM `alumni` WHERE `id`='$id';";
	  
	  $run=mysqli_query($con,$qry);
	  if($run==true)
	  {
		  ?>
		  
		  <script>
		  alert('DATA DELETED SUCCESSFULLY.');
		window.open('deletealumni.php','_self');
		</script>
		  <?php
	  }
?>