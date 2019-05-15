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
include('titlehead.php');
?>
<div class="container">
<form method="POST">
  <div class="form-group">
  	<label>Enter USN </label>
    <input type="text" class="form-control" name="usn" placeholder="Enter usn which you are looking for" required/>
  </div>
  <div class="form-group">
  	<label>Enter Name</label>
    <input type="text" class="form-control" name="name" placeholder="Enter Name" required/>
  </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-info sinbtn">search</button>
        </div>
</form>
</div>
<div class="container">
<table class="table table-hover">
 <tr>
	<th scope="col">Sno.</th>
	<th scope="col"> USN</th>
	<th scope="col">NAME</th>
		<th scope="col">DOB</th>
	<th scope="col" width="15%">YEAR OF PASSING</th>
	<th scope="col">EMAIL ID</th>
	<th scope="col">CONTACT NUMBER</th>
		<th scope="col">COMPANY</th>
			<th scope="col">DESIGNATION</th>
				<th scope="col">ADDRESS</th>
	<th scope="col">EDIT DETAILS</th>
  </tr>
<?php
    if(isset($_POST['submit']))
 {
	  include('../dbcon.php');
	  
	 $ussn=$_POST['usn'];
	 $name=$_POST['name'];
	 $sql="SELECT * FROM `alumni`WHERE `USN`='$ussn' OR `NAME` LIKE '%$name%'";
	 $run=mysqli_query($con,$sql);
	
	if(mysqli_num_rows($run)<1)
	 {
		
		echo"<tr><td colspan='6'>RECORD NOT FOUND</td></tr>";
	 }
	 else
	{
	  $count=0;
	  while($data=mysqli_fetch_assoc($run))
	    {
		  $count++;
?>
	    <tr>
		  <td scope="row"><?php echo $count ;?></td>
		  <td scope="row"><?php echo $data['USN'];?></td>	
		  <td scope="row"><?php echo $data['NAME'];?></td>
		  <td><?php echo htmlentities($data['DOB']); ?></td>
		  <td scope="row"><?php echo $data['YEAR'];?></td>
		  <td scope="row"><?php echo $data['E_MAIL'];?> </td>
		  <td scope="row"><?php echo $data['CONTACT_NO'];?></td>
		  	  <td><?php echo htmlentities($data['COMPANY']); ?></td>
			  	  <td><?php echo htmlentities($data['DESIGNATION']); ?></td>
				  	  <td><?php echo htmlentities($data['ADDRESS']); ?></td>
		  <td scope="row" color="red";><a href="updateform.php?sid=<?php echo $data['id'];?>">Edit</a></td>	

        </tr>
		<?php
	   }
   }
 }
 ?>
</table>
</div>