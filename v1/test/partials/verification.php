<?php
error_reporting(E_ALL ^ ~E_WARNING);
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("login") or die(mysql_error());
$mail=$_POST['email-id'];
$result=mysql_query("select email from user_data where email='".$mail."'");
$row=mysql_num_rows($result);
if($row>=1)
{$to = $mail;
$subject = "Reset Password";
$pd = generateRandomString();
$query= "UPDATE user_data 
     SET password='".$pd."' 
     WHERE email='".$mail."'";
mysql_query($query);

	 $txt = "Your Default Password is".$pd." Please Reset Your Password First After Logging In";
$headers = "From: developtheweb@mail.com" . "\r\n" .
"CC: satishpadnani2015@gmail.com";
#if(mail($to,$subject,$txt,$headers))
header("Location: http://localhost/DevelopoTory/v1/test/#/ftpd?success"); // Redirecting To Other Page
	
#else
#echo"There is error";	
	}

else
{
header("Location: http://localhost/DevelopoTory/v1/test/#/ftpd?userdoesnotexist"); // Redirecting To Other Page

}
mysql_close();
?>
<?php function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>