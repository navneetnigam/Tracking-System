<?php
/*mysql_connect('localhost','root','');
mysql_select_db('combine_tracking'); 
$query="select * from expense where username='$username'";
$res=mysql_query($query);
 $_SESSION["count"] = 0;*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "combine_tracking";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
$username=$_SESSION["username"]; 
$income=$_POST['income'];

$sql = "SELECT * from expense where username='$username'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	$transport_expense = $_POST['transportex'] + $row['transportation_expense'];
	$food_expense = $_POST['foodex'] + $row['food_expense'];
	$clothing_expense = $_POST['clothingex'] + $row['clothing_expense'];
	$electronic_expense = $_POST['electronicex'] + $row['electronic_expense'];
	$grossery_expense = $_POST['grosseryex'] + $row['grossery_expense'];
	$other_expense = $_POST['otherex'] + $row['others'];
	$query="update expense set transportation_expense='$transport_expense',food_expense='$food_expense',clothing_expense='$clothing_expense',electronic_expense='$electronic_expense',grossery_expense='$grossery_expense',others='$other_expense' where username = '$username'";
    mysqli_query($conn,$query);
    header("Location:data.php");
	}
else{
	$savings_target = $_POST['savings'];
	$transport_expense = $_POST['transportex'] ;
	$food_expense = $_POST['foodex'] ;
	$clothing_expense = $_POST['clothingex'];
	$electronic_expense = $_POST['electronicex'] ;
	$grossery_expense = $_POST['grosseryex'] ;
	$other_expense = $_POST['otherex'] ;
	$sql="insert into expense (username,savings_target,income,transportation_expense,food_expense,clothing_expense,electronic_expense,grossery_expense,others) values ('$username','$savings_target','$income','$transport_expense','$food_expense','$clothing_expense','$electronic_expense','$grossery_expense','$other_expense')";
     mysqli_query($conn,$sql);
    header("Location:data.php");
}
 mysqli_close($conn);
?>