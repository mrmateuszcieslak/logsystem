<?php
$connect=mysqli_connect("localhost","root","","loginsystem");
session_start();
if(isset($_SESSION["username"]))
{
   header("location:entry.php");
}
if(isset($_POST["register"]))
{
	header("location:entry.php");  
}
if(isset($_POST["register"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Pola są wymagane")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = md5($password);  
           $query = "INSERT INTO users (username, password) VALUES('$username', '$password')";  
           if(mysqli_query($connect, $query))  
           {  
                echo '<script>alert("Rejestracja zakończona")</script>';  
           }  
      }  
 } 
 if(isset($_POST["login"]))
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Pola są wymagane")</script>';  
      }   
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = md5($password);  
           $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                $_SESSION['username'] = $username;  
                header("location:entry.php");  
           }  
           else  
           {  
                echo '<script>alert("ERROR danych!!")</script>';  
           }  
      }  
 }  
?>
<!DOCTYPE html>  
 <html>  
 <head>  
 <title>Rejestracja</title>  
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />  
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>  
</head>
<body>  
<br /><br />  
 <div class="container" style="width:500px;">  
 <h3 align="center">Login System</h3>  
 <br />  
 <?php  
 if(isset($_GET["action"]) == "login")  
 {  
 ?>  
<h3 align="center">Login</h3> 
<br />  
<form method="post">    
<label>Nazwa Użytkownika:</label>  
<input type="text" name="username" class="form-control" />  
<br />  
<label>Hasło:</label>  <input type="password" name="password" class="form-control" />  
<br />  
<input type="submit" name="login" value="Login" class="btn btn-info" />  
<br />  
<br/>
<div class="card login-form">
     <div class="card-body">
          <h3 class="card-title text-center">Resetuj hasło</h3>
          
          <div class="card-text">
               <form>
                    <div class="form-group">
                         <label for="exampleInputEmail">Wpisz swój adres e-mail, a my wyślemy Ci link do zresetowania hasła.</label>
                         <input type="email" class="form-control form-control-sm" placeholder="Wpisz swój adres e-mail">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Wyślij wiadomość e-mail z resetem hasła</button>
               </form>
          </div>
     </div>
</div>
<p align="center"><a href="index.php">Rejestracja</a></p>  
</form>  
<?php       
}  
else  
{  
?>  
<h3 align="center">Rejestracja</h3>  
<br />  
<form method="post">  
<label>Adres Email:</label>
<input type="email" name="email" class="form-control" />
<label>Nazwa Użytkownika:</label>  
<input type="text" name="username" class="form-control" />
 <br />  
 <label>Hasło:</label>  
 <input type="password" name="password" class="form-control" />  
   <br />  
 <input type="submit" name="register" value="Rejestracja" class="btn btn-info" />  
  <br />  
  <p align="center"><a href="index.php?action=login">Login</a></p>  
  </form>  
  </div>  
 </body>  
 </html>  