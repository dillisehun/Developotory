

<?php
error_reporting(E_ALL ^ ~E_WARNING);
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("login") or die(mysql_error());
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$password=$_POST['password'];
$email=$_POST['email'];
$mobile="".$_POST['mobile'];
$result=mysql_query("select * from user_data where email='".$email."'");
$row=mysql_num_rows($result);
if($row==0)
{
$query=mysql_query("INSERT INTO user_data(firstname, lastname, password, email, mobile) VALUES ('".$fname."','".$lname."','".$password."','".$email."',".$mobile.")");
if($query) {
header("Location: http://localhost/DevelopoTory/v1/test/#/login?success"); // Redirecting To Other Page
	}
else {
echo "Error";
echo "".$fname;
}}
else
{
header("Location: http://localhost/DevelopoTory/v1/test/#/login?useralreadyexist"); // Redirecting To Other Page

}
mysql_close();
?>
