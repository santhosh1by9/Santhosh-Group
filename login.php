<?php
$phone=$_GET["phone"];
$password=$_GET["password"];
$allow=0;
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
$allow=1;
}
}
if($allow)
{
echo "ok";
setcookie("phone",$phone, time() + (86400 * 30), "/");
setcookie("password",$password, time() + (86400 * 30), "/");
}
?>