<?php
$con=mysqli_connect("localhost","root","","place4u");
$result=mysqli_query($con,"select * from restaurants");
if(isset($_POST["submit"]))
{
echo $test = $_POST['submit'];
$comment = $_POST['comment'];
$query = "UPDATE restaurants SET comments=CONCAT(comments,'\n','$comment') WHERE photo = '$test'";
$query_run = mysqli_query($con, $query);
header("Location: Restaurants.php");
}
?> 