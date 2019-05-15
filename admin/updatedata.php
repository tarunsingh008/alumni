<?php

 include('../dbcon.php');
	  $usn=$_POST['usn'];
	  $name=$_POST['name'];
	  $year=$_POST['year'];
	  $dob=$_POST['dob'];
	  $email=$_POST['email'];
	  $contact=$_POST['contact'];
	  
	   $company=$_POST['company'];
	  $designation=$_POST['designation'];
	  $address=$_POST['address'];
	  $id=$_POST['sid'];
	$qry="UPDATE `alumni` SET `USN` = '$usn', `NAME` = '$name', `DOB`='$dob',`YEAR` = '$year', `E_MAIL` = '$email' , `CONTACT_NO` = '$contact' COMPANY='$company',DESIGNATION='$designation',ADDRESS='$address' WHERE `id` ='$id';";
	  
	  $run=mysqli_query($con,$qry);
	  if($run==true)
	  {
		  ?>
		  
		  <script>
		  alert('DATA UPDATED SUCCESSFULLY.');
		window.open('updateform.php?sid=<?php echo $id;?>','_self');
		</script>
		  <?php
	  }
?>