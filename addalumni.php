
<?php
include('header.php');
include('titlehead1.php');
?>
<head>
<style type="text/css">

body {
 
 

  min-height: 380px;

 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
.mandatory{
	 color:red;
}
</style>

</head>
<body >
<div class="container" style="width: 60%" >
<form method="post" action="addalumni.php" class="a" enctype="multipart/form-data">
  	<div class="form-group">
	<br>
	<br>
    <label>Name</label><span class="mandatory"> *</span>
    <input type="text" name="name" class="form-control" placeholder="Enter your name"required>
  	</div>
		<div class="form-group">
    <label>Dob</label><span class="mandatory"> *</span>
    <input type="date" name="dob" class="form-control" placeholder="Enter your DOB"required>
  	</div>
	<div class="form-group">
    <label>USN</label>
    <input type="text" name="usn" class="form-control" placeholder="Enter usn" >
  	</div>
  	<div class="form-group">
    <label>Year</label><span class="mandatory"> *</span>
    <input type="number" name="year" class="form-control" placeholder="Enter year of passing" required>
	</div>
  	<div class="form-group">
    <label>Email Address</label><span class="mandatory"> *</span>
    <input type="email" name="email" class="form-control" placeholder="Enter your e-mail"  required>
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

</body>
  </html>
  <?php
  
  
  
  if(isset($_POST['submit']))
  {
	  
	  include('dbcon.php');
	  $usn=$_POST['usn'];
	  $name=$_POST['name'];
	  $dob=$_POST['dob'];
	  $year=$_POST['year'];
	  $email=$_POST['email'];
	  $contact=$_POST['contact'];
	  $company=$_POST['company'];
	  $designation=$_POST['designation'];
	  $address=$_POST['address'];
	  $qry="INSERT INTO `alumni`(`USN`, `NAME`, `DOB`,`YEAR`, `E_MAIL`, `CONTACT_NO`,`COMPANY`,`DESIGNATION`,`ADDRESS`) VALUES ('$usn','$name','$dob','$year','$email','$contact','$company','$designation','$address')";
	  
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
 <p style ="text-align:center ;font-size:20px;color:blue;">PLEASE FILL THE VISITING FORM BELOW</p>
 <p  style ="text-align:center ;font-size:20px;color:blue;" >
 <a href="https://docs.google.com/forms/d/1js726oDS2Pf4h51GqceX_5V7pLNZKyOnIOhVPc4XQIk/edit?usp=sharing_eip&ts=5c0f46e5">CLICK HERE</a>
 <br>
 <h4 style="color:red ;text-align:center"><b>NOTE : </b>All fields marked by ( * ) are mandatory.</b></h4>

  </p>
  </html>
  
 