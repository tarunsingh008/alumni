<?php 
  function showdetails($year)
 {
    include('dbcon.php');
$sql="SELECT * FROM `alumni` WHERE `YEAR`=$year";
$run=mysqli_query($con,$sql);
if(mysqli_num_rows($run)>0)
  {
	  $data=mysqli_fetch_assoc($run);
	  
?>
<table>

  <tr>

      <th colspan="2">ALUMNI DETAILS</th>
  </tr>
  <tr>

      <th rowspan="5">ALUMNI DETAILS</th>
	  <th>USN</th>
	  <td><?php echo $data['USN'];?></td>
  </tr>
<tr>
	  <th>NAME</th>
	  <td><?php echo $data['NAME'];?></td>
  </tr>
  <tr>
	  <th>YEAR</th>
	  <td><?php echo $data['YEAR'];?></td>
  </tr>
  <tr>
	  <th>EMAIL-ID</th>
	  <td><?php echo $data['E-MAIL'];?></td>
  </tr>
  <tr>
	  <th>CONTACT NO.</th>
	  <td><?php echo $data['CONTACT NO'];?></td>
  </tr>
</table>
<?php
}
  
else
{
	echo"<script>alert('DATA NOT FOUND.');</script>";
}
}
	?>