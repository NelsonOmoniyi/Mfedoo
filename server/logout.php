<?php   
include("libs/dbfunctions.php");
$dbobject = new dbobject();
 session_destroy();//destroy the session
header("location:login.html"); //to redirect back to "index.php" after logging out
exit();
?>