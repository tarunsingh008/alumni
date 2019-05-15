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
<html>
<style>
.mandatory{
	 color:red;
}
</style>
</html>

<?php
include('header.php');
include('titlehead.php');
?>

<div class="container" style="width: 60%">
<form method="post" action="addalumni.php" enctype="multipart/form-data">
	<div class="form-group">
	<div class="form-group">
	<br>
	<br>
    <label>Name</label><span class="mandatory"> *</span>
    <input type="text" name="name" class="form-control"  placeholder="Enter your name"required>
  	</div>
		<div class="form-group">
    <label>DOB</label><span class="mandatory"> *</span>
    <input type="date" name="dob" class="form-control" placeholder="Enter your DOB"required>
  	</div>
    <label>USN</label>
    <input type="text" name="usn" class="form-control" placeholder="Enter usn" >
  	</div>
  	
  	<div class="form-group">
    <label>Year</label>
    <input type="number" name="year" class="form-control" placeholder="Enter year of passing" required>
	</div>
  	<div class="form-group">
    <label>Email Address</label>
    <input type="text" name="email" class="form-control" placeholder="Enter e-mail id">
  	</div>
 <div class="form-group">
    <label>Contact number(Whatsapp number preferred)( +91 not required. )</label><span class="mandatory"> *</span>
    <input type="text" name="contact"  class="form-control" pattern="[6789][0-9]{9}"  placeholder="Enter contact number" required >
  	</div>
	<div class="form-group">
    <label>Current company name</label><span class="mandatory"> *</span>
    <input type="text" name="company"  class="form-control" placeholder="Enter current company name" >
  	</div> 
		<div class="form-group">
    <label>Designation</label><span class="mandatory"> *</span>
    <input type="text" name="designation"  class="form-control" placeholder="Enter your designation" >
  	</div> 
	<div class="form-group">
   <label>Address</label><span class="mandatory"> *</span><textarea name="address" class="form-control" placeholder="Enter the address of the company currently working for"></textarea>
    </div>
	<button type="submit" name ="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
  </html>
  <?php
  
  
  
  if(isset($_POST['submit']))
  {
	  
	  include('../dbcon.php');
	  $usn=$_POST['usn'];
	  $name=$_POST['name'];
	   $dob=$_POST['dob'];
	  $year=$_POST['year'];
	  $email=$_POST['email'];
	  $contact=$_POST['contact'];
	  $company=$_POST['company'];
	   $designation=$_POST['designation'];
	  $address=$_POST['address'];
	 // $qry="INSERT INTO `alumni`(`USN`, `NAME`, `YEAR`, `E_MAIL`, `CONTACT_NO`,`COMPANY`) VALUES ('$usn','$name','$year','$email','$contact','$company')";
	     $qry="INSERT INTO `alumni`(`USN`, `NAME`, `DOB`,`YEAR`, `E_MAIL`, `CONTACT_NO`,`COMPANY`,`DESIGNATION`,`ADDRESS`) VALUES ('$usn','$name','$dob','$year','$email','$contact','$company','$designation','$address')"; 
//$qry="INSERT INTO `alumni`(`USN`, `NAME`,`DOB`, `YEAR`, `E_MAIL`, `CONTACT_NO`,`COMPANY`,`DESIGNATION`,`ADDRESS`) VALUES ('$usn','$name','$dob',$year','$email','$contact','$company','$designation','$address')";
	  $run=mysqli_query($con,$qry);
	  if($run==true)
	  {
		  ?>
		  
		  <script>
		  alert('data inserted successfully.');
		  </script>
		  <?php
	  }  
	  
  }  
  ?>
  <html>
  
  </html>
  
 