<?php

session_start ();

$user = @$_SESSION['username'];

if ($user)
{
if (@$_POST['submit'])
{
$newpassword = md5(@$_POST['newpassword']);
$repeatnewpassword =md5(@$_POST['repeatnewpassword']);

$connect = mysql_connect ("localhost","root","") or die();
mysql_select_db("phplogin")or die();

$queryget = mysql_query ("SELECT password FROM users WHERE username='$user'")or die ("Zapytanie nie zadziałało");
$row = mysql_fetch_assoc($queryget);

{

if ($newpassword==$repeatnewpassword)
{
$querychange = mysql_query
("UPDATE users SET password='$newpassword' WHERE username='$user'");
session_destroy();
die ("Hasło zostało zmienione.<a href='changepass.php'>");

}
else 
 die ("Nowe hasło nie pasuje!");
}

}
else{
   die ("Zmiana hasła poprawna!!");
}
}