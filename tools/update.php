<?php
$phone=$_COOKIE["phone"];
$password=$_COOKIE["password"];
$allow=0;$p=0;
$servername = "localhost";
$username = "root";
$pw = 12121999;
$dbname = "guvi";
$conn = mysqli_connect($servername, $username, $pw, $dbname);
$sql = "select * from users";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result);
mysqli_close($conn);
for($i=0;$i<count($row);$i++)
{
if($phone==$row[$i][1]&&$password==$row[$i][2])
{
$allow=1;$p=$i;
}
}
if($allow)
{
$conn = mysqli_connect($servername, $username, $pw, $dbname);
$sql = "select * from users";
	if(isset($_GET["name"]))
	{
		$v=$_GET["name"];
		$sql = "UPDATE users SET name = '".$v."' WHERE phone = ".$phone;
	}
	else if(isset($_GET["password"]))
	{
		$v=$_GET["password"];
		$sql = "UPDATE users SET password = '".$v."' WHERE phone = ".$phone;
	}
	else if(isset($_GET["dob"]))
	{
		$v=$_GET["dob"];
		$sql = "UPDATE users SET dob = '".$v."' WHERE phone = ".$phone;
	}
	else if(isset($_GET["age"]))
	{
		$v=$_GET["age"];
		$sql = "UPDATE users SET age = '".$v."' WHERE phone = ".$phone;
	}
	else if(isset($_GET["email"]))
	{
		$v=$_GET["email"];
		$sql = "UPDATE users SET email = '".$v."' WHERE phone = ".$phone;
	}
	else if(isset($_GET["place"]))
	{
		$v=$_GET["place"];
		$sql = "UPDATE users SET place = '".$v."' WHERE phone = ".$phone;
	}
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
echo "ok";
}

?>