<!DOCTYPE html>
<html>
<head>
<title>Santhosh</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- -->
<link href="font-awesome/4.7.0/css/font-awesome.min.css"rel="stylesheet"/>
<link rel="stylesheet" href="bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript"src="ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="aos/aos.css"rel="stylesheet"/>
<link href="css/style.css"rel="stylesheet"/>
<!-- -->
</head>
<body>
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
//starting....................................................................................................................
echo '<div class="alert-box notice"></div>
<div class="header">santhosh1by9@gmail.com</div>
<div class="row form-container index">
	<div class="col-sm-4"></div>
	<div class="col-sm-4 form-box gap"style="top:100px;">
<!-------------------------------------------------------- Form Panel -------------------------------------------->
		<div class="btn-box">
			<div class="outter-round item-align-center head-i">
				<div class="inner-round">
					<i class="fa fa-user"></i>
				</div>
			</div>
		</div>
			<div class="form-body">
				<table class="item-align-center">
					<tr><th>Name</th><td class="editable">'.$row[$p][0].'</td></tr>
					<tr><th>Phone</th><td class="editable">'.$row[$p][1].'</td></tr>
					<tr><th>Password</th><td class="editable">'.$row[$p][2].'</td></tr>
					<tr><th>DOB</th><td class="editable">'.$row[$p][3].'</td></tr>
					<tr><th>Age</th><td class="editable">'.$row[$p][4].'</td></tr>
					<tr><th>E-mail</th><td class="editable">'.$row[$p][5].'</td></tr>
					<tr><th>Place</th><td class="editable">'.$row[$p][6].'</td></tr>
				</table>
				<a class="btn btn-danger item-align-center btn-border-radius-0 logout"href="tools/logout.php">
				Logout<i class="fa fa-unlock i-right"></i>
				</a>
			</div>
<!-------------------------------------------------------- Form Panel -------------------------------------------->
	</div>
	<div class="col-sm-4"></div>
</div>';
//Ending...................................................................................................................
}
else
{
header("Location:login.html");
}
?>
</body>
<script type="text/javascript">
$(document).ready(function(){
	for(i=0;i<$(".editable").length;i++)
	{
		if(i!=1){
		var a=document.createElement("i");
		a.setAttribute("class","fa fa-pencil btn btn-primary");
		a.setAttribute("onclick","edit(this)");
		$(".editable")[i].appendChild(a);
		}
	}

});
function edit(a)
{
var back=document.createElement("div");
back.setAttribute("class","back");
back.setAttribute("onclick","alertClose()");
document.body.append(back);
var alertBox=document.getElementsByClassName("alert-box")[0];
alertBox.style.display="block";
alertBox.style.top="100px";
alertBox.classList.add("editor");
var tr=a.parentElement.parentElement;
var e3=tr.getElementsByTagName("td")[0].innerHTML;
var e4=e3.split("<i");
var e0=tr.getElementsByTagName("th")[0].innerHTML;
var e1="<h3>"+e0+"</h3>";
if(e0=="E-mail"){e0="email";}
var e22=e0.toLowerCase();
var f1=["Name","Password","DOB","Age","E-mail","Place"];
var f2=["text","text","date","Number","email","text"];
for(i=0;i<f1.length;i++)
{
	if(e0==f1[i]){break;}
}
var e2="<input type='"+f2[i]+"'name='"+e22+"'value='"+e4[0]+"'/>";
var e5='<button class="btn btn-success item-align-center update"onclick="update(this)">Update</button>';
alertBox.innerHTML=e1+e2+e5;
}
function alertClose()
{
setTimeout(function(){document.body.removeChild(document.getElementsByClassName("back")[0]);},500);
var alertBox=document.getElementsByClassName("alert-box")[0];
alertBox.style.top="-200px";
setTimeout(function(){var elmnt=document.getElementsByClassName("alert-box")[0];elmnt.style.display="none";},500);
}
function update(a)
{
var form=a.parentElement;
var input=form.getElementsByTagName("input")[0];
var name=input.getAttribute("name");
var val=input.value;
var v=name+"="+val;
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText=="ok"){location.href="";}
            }
        };
        xmlhttp.open("GET", "tools/update.php?"+v, true);
        xmlhttp.send();
}
</script>
</html>