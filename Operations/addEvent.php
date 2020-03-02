<?php
$status = "";
$conn = mysqli_connect('server116.web-hosting.com', 'movegvka_admin', 'Admin2020', 'movegvka_move');
$query = "SELECT * from event"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$msg="";
if(isset($_POST['submitEvent']))
{
$title = $_POST['title'];
$date = $_POST['date'];
$details = $_POST['details'];

 $countfiles = count($_FILES['image']['name']);
 $result_arr = [];
 // Looping all files
 for($i=0;$i<$countfiles;$i++){

  $filename = $_FILES['image']['name'][$i];
  array_push($result_arr, $filename);
  // Upload file
  move_uploaded_file($_FILES['image']['tmp_name'][$i],'images/'.$filename);

 }
  $s=serialize($result_arr);
  $insert="INSERT INTO event (name, date, body,image) VALUES('$title', '$date', '$details','$s')";
  mysqli_query($conn, $insert); 
$status = "Event Added Successfully. </br></br>
<a href='../Pages/events.php'>View All Events</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}
?>