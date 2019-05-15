<?php
session_start();
error_reporting(0);
include('../dbcon.php');
if(strlen($_SESSION['uid'])== ""){
	header("Location:index.php");
}
else{ if(isset($_POST['submit'])){
	  $usn=$_POST['usn'];
	  $name=$_POST['name'];
	  $dob=$_POST['dob'];
	  $year=$_POST['year'];
	  $email=$_POST['email'];
	  $contact=$_POST['contact'];
	   $company=$_POST['company'];
	  $designation=$_POST['designation'];
	  $address=$_POST['address'];
	  $id=intval($_GET['sid']);
	 $sql=" UPDATE `alumni` SET `id`='$id',`USN`='$usn',`NAME`='$name',`YEAR`='$year',`E_MAIL`='$email',`CONTACT_NO`='$contact',`COMPANY`='$company',`DESIGNATION`='$designation',`ADDRESS`='$address',`DOB`='$dob' WHERE `id`='$id';";
//$sql = "UPDATE alumni SET `USN`='$usn',`NAME`='$name',`DOB`='$dob',`YEAR`='$year',`E_MAIL`='$email',`CONTACT_NO`='$contact' `COMPANY`='$company',`DESIGNATION`='$designation',`ADDRESS`='$address' WHERE `id` = '$id';";
	  $run = mysqli_query($con,$sql);
	if($run==true)
	  {
		  ?>
		  
		  <script>
		  alert('DATA UPDATED SUCCESSFULLY.');
		window.open('updateform.php?sid=<?php echo $id;?>','_self');
		</script>
		  <?php
	  }
}
}
?>
<?php
include('header.php');
include('titlehead.php');

$sid=intval($_GET['sid']);
$sql="SELECT * FROM `alumni` WHERE `id`='$sid'";
$run=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($run);

?>
<div class="container" style="width:60%">
	<div class="row">
		<form method="post">
  <div class="form-group">
    <label>USN</label>
    <input type="text" class="form-control" placeholder="USN" name="usn" value=<?php echo $data['USN'];?> required>
  </div>
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="name" name="name" value=<?php echo $data['NAME'];?> required>
  </div>
  
    <div class="form-group">
    <label>DOB</label>
    <input type="date" class="form-control" placeholder="DOB" name="dob" value=<?php echo $data['DOB'];?> required>
  </div>
  
  <div class="form-group">
    <label>Year</label>
    <input type="text" class="form-control" placeholder="year" name="year" value=<?php echo $data['YEAR'];?> required>
  </div>
  <div class="form-group">
    <label>Email address</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email" value=<?php echo $data['E_MAIL'];?> required>
  </div>
  <div class="form-group">
    <label>Contact Number</label>
    <input type="text" class="form-control"placeholder="contact number" name="contact" value=<?php echo $data['CONTACT_NO'];?> required>
  </div>
  <div class="form-group">
    <label>Current company name</label><span class="mandatory"> *</span>
    <input type="text" name="company"  class="form-control" placeholder="Enter current company name" value=<?php echo $data['COMPANY'];?> required>
  	</div> 
		<div class="form-group">
    <label>Designation</label><span class="mandatory"> *</span>
    <input type="text" name="designation"  class="form-control" placeholder="Enter your designation" value=<?php echo $data['DESIGNATION'];?> required>
  	</div>  
	<div class="form-group">
   <label>Address</label><span class="mandatory"> *</span>
   <input  type="text" name="address" class="form-control" placeholder="Enter the address of the company currently working for" value=<?php echo $data['ADDRESS'];?> required> 
    </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
	</div>
</div>
   