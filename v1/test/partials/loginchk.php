
<?php
error_reporting(E_ALL ^ ~E_WARNING);

mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("login") or die(mysql_error());
$email=$_POST['email'];
$password=$_POST['password'];
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);

$result=mysql_query("select * from user_data where email='".$email."'");
$row=mysql_num_rows($result);
if($row==0)
{     header("Location: http://localhost/DevelopoTory/v1/test/#/login?invalid");

}
else{
$query=mysql_fetch_assoc($result);
if($query["email"]==$email &&$query["password"]==$password) {
$_SESSION['login_user']=$email;
header("Location: http://localhost/DevelopoTory/v1/test/#/?success");
	}
else {
header("Location: http://localhost/DevelopoTory/v1/test/#/login?invalid");

}}
mysql_close();
?>
