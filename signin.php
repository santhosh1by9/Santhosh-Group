<?php
$name=$_GET["name"];
$phone=$_GET["phone"];
$password=$_GET["password"];
$allow=1;
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
if($phone==$row[$i][1])
{
$allow=0;
}
}
if($allow)
{
echo 'ok';
$conn = mysqli_connect($servername, $username, $pw, $dbname);
$sql = "insert into users values ('".$_GET["name"]."','".$_GET["phone"]."','".$_GET["password"]."','','','','')";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
setcookie("phone",$phone, time() + (86400 * 30), "/");
setcookie("password",$password, time() + (86400 * 30), "/");
}
//else{echo 'Already Found..!';}
?>