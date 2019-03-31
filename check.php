<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
mysql_connect('localhost','root','');
mysql_select_db("combine_tracking");
$query="select * from User_list where username='$username' and password='$password'";
$res=mysql_query($query);
 $_SESSION["count"] = 0;
if($row=mysql_fetch_array($res,MYSQL_BOTH))
{ 
	$_SESSION["username"] = $username ;
    $_SESSION["password"] = $password;
	header("Location:index.html");
}
else
{
	header("Location:login.html");
}
?>