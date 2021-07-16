<?php
if(isset($_POST['update']))
{
  $n_password=$_POST['n_password'];
  $n_password=mysqli_real_espace_string($conn,$n_password);
  $n_password=htmlentities($n_password);
  $c_password=$_POST['c_password'];
  $c_password=mysqli_real_escape_string($conn,$c_password);
  $c_password=htmlentities($c_password);
  if($c_password === $n_password)
  	{
    
     $email=$_SESSION['email'];    
     $sql="update users set password='$n_password' where email='$email'";
     $res=mysqli_query($conn,$sql);
     
     if($res)
     {
         header("Location: settings.php");
     }
     else
     {
         header("Location: settings.php");
     }
  }
  else
  {
      header("Location: settings.php");
}
}
?>