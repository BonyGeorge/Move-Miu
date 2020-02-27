<?php
$status = "";
$conn = mysqli_connect('server116.web-hosting.com', 'movegvka_admin', 'Admin2020', 'movegvka_move');
if(isset($_POST['submitAdmin']))
{
$username = $_POST['username'];
$update="update users set type='admin' where username='$username'";
mysqli_query($conn, $update) or die(mysqli_error());
$status = "Admin Added Successfully. </br></br>
<a href='../Pages/index.php'>Back To Home</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}
?>