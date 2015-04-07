// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 

<?php
session_start();
if(!isset($_SESSION["sess_user"]){
header("location:member/member_athlete.php");
}
?>

<html>
<body>
Login Successful
</body>
</html>