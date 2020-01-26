<?php
$status = "";
$conn = mysqli_connect("localhost", "root", "", "move");
$query = "SELECT * from event"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submitEvent']))
{
$title = $_POST['title'];
$date = $_POST['date'];
$details = $_POST['details'];
$insert="INSERT INTO event (name, date, body) VALUES('$title', '$date', '$details')";
mysqli_query($conn, $insert);
$status = "Record Updated Successfully. </br></br>
<a href='Events.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}
?>