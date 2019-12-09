$(document).ready(function(){
	$(".form-group label").on("click",function(){
		this.parentElement.getElementsByTagName("input")[0].focus();
	});
});
function login()
{
//var name=document.getElementById("name").value;
var phone=document.getElementById("phone").value;
var password=document.getElementById("password").value;
if(phone.length==10&&password.length!=0)
{
	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
                var op=this.responseText;
                if(op=="ok"){location.href="index.php";}
                else{alert('<i class="fa fa-info-circle"></i><h3>Try Again..!</h3>');}
            }
        };
    xmlhttp.open("GET", "login.php?phone="+phone+"&password="+password, true);
    xmlhttp.send();
}
else if(phone.length==0||password.length==0)
{
alert('<i class="fa fa-info-circle"></i><h3>Fill in the blanks.</h3>');
}
else if(phone.length!=10)
{
alert('<i class="fa fa-info-circle"></i><h3>Phone Number must in 10 digit</h3>');
}
}
function alert(a)
{
var back=document.createElement("div");
back.setAttribute("class","back");
back.setAttribute("onclick","alertClose()");
document.body.append(back);
var alertBox=document.getElementsByClassName("alert-box")[0];
alertBox.style.display="block";
alertBox.style.top="100px";
alertBox.innerHTML=a;
}
function alertClose()
{
setTimeout(function(){document.body.removeChild(document.getElementsByClassName("back")[0]);},500);
var alertBox=document.getElementsByClassName("alert-box")[0];
alertBox.style.top="-200px";
setTimeout(function(){var elmnt=document.getElementsByClassName("alert-box")[0];elmnt.style.display="none";},500);
}