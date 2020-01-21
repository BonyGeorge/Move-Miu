<?php
$status = "";
$conn = mysqli_connect("localhost", "root", "", "move");
$query = "SELECT * from users"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submitAdmin']))
{
$username = $_POST['username'];
$update="update users set type='admin' where username='$username'";
mysqli_query($conn, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='index.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}
?>