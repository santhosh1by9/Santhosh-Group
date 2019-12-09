<style type="text/css">
	table,td,th{border: 1px solid #ddd;text-align: center;}
table{border-collapse:collapse;width:95%;}
th,td{padding: 15px;font-weight:bold;}
</style>
<?php
$phone=$_COOKIE["phone"];
$password=$_COOKIE["password"];
$allow=0;$p=0;
$servername = "sql104.epizy.com";
$username = "epiz_24362358";
$pw = "CDkZPwAIlQhhA";
$dbname = "epiz_24362358_guvi";
$conn = mysqli_connect($servername, $username, $pw, $dbname);
$sql = "select * from users";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result);
mysqli_close($conn);
echo '<table>
<tr><th>Name</th><th>Phone</th><th>Password</th><th>DOB</th><th>Age</th><th>E-mail</th><th>Place</th>';
for($i=0;$i<count($row);$i++)
{
echo '<tr><td>'.$row[$i][0].'</td><td>'.$row[$i][1].'</td><td>'.$row[$i][2].'</td><td>'.$row[$i][3].'</td><td>'.$row[$i][4].'</td><td>'.$row[$i][5].'</td><td>'.$row[$i][6].'</td>';
}
echo '</table>';
?>