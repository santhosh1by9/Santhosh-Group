<?php
setcookie("phone","", time() + (86400 * 30), "/");
setcookie("password","", time() + (86400 * 30), "/");
header("Location:../login.html");
?>