<?php
$username=$_POST['username'];
$firstname=$_POST['fname'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$password=$_POST['password'];
$lastname=$_POST['lname']; 
mysql_connect('localhost','root','');
mysql_select_db('combine_tracking');
$query="insert into User_list(username,firstname,lastname,email,password,gender) values ('$username','$firstname','$lastname','$email','$password','$gender')";
mysql_query($query); 
session_start();
$_SESSION["username"] = $username;
$_SESSION["password"] = $password;
header("Location:index.html");
?>