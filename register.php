<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>


<?php
 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $passwordErr = $password1Err = $fullnameErr=$usernameErr = "";
  $password = $password1 = $username =$fullname= "";

  if(isset( $_SESSION['user'])&& isset($_SESSION['password'])&& isset($_SESSION['fullname']))
  {
    if($_SERVER["METHOD"] == "POST")
    {
        /*provera polja sifra*/ 
        if(empty($_POST["password"]))
        {
            $passwordErr="Required field";
        }
        else
        {
            $password=test_input($_POST["password"]);
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);
            #ako nema jedno od ta tri onda ispisuje gresku
            if(!$uppercase || !$lowercase || !$number) {
                $passwordErr="Must contain one big letter and one number at least";
            }
        }
 /*provera polja fullname*/
 if(empty($_POST["fullname"]))
        {
            $fullnameErr="Required field";
        }
        else
        {
            $fullname=test_input($_POST["fullname"]);
        }
           /*provera polja ponovna sifra*/ 

  if(empty($_POST["password1"]))
  {
      $password1Err="Required field";
  }
  else
  {
    $password1=test_input($_POST["password1"]);
    if($password!=$password1)
    {
        $password1Err="Passwords don't match!";
         }
  }
    /*provera polja username*/ 
   if(empty($_POST["user"]))
        {
            $usernameErr="Required field";
        }
        else
        {
            $username=test_input($_POST["user"]);
            if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
                $usernameErr="Email is not valid";
            }
        }
        if($password1Err == "" && $usernameErr == "" && $passwordErr=="" &&$fullnameErr=="")
        {
            include 'konekcija.php';
            #https://www.w3schools.com/php/php_mysql_prepared_statements.asp
            #ubacuje podatke

            $stmt = $conn->prepare("INSERT INTO User (Username, Full_name,Passwordd) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username,$fullname,$password);
            $username=test_input($_POST["user"]);
            $stmt->execute();
            $username=test_input($_POST["fullname"]);
            $stmt->execute();
            $username=test_input($_POST["password"]);
            $stmt->execute();
            
            $stmt->close();
            $conn->close();
        }
         #ako nema gresaka mejl i sifra se prosledjuju u sesije
         if($password1Err == "" && $usernameErr == "" && $passwordErr=="" &&$fullnameErr=="")
         {
             $_SESSION["user"]=$username;
             $_SESSION["password"]=$password;
             $_SESSION["fullname"]=$fullname;
         } 
        if(isset($_POST['checkbox']))
        {

        }
    }
}
else
{
    session_destroy();
}
?>


    <!-- pravljenje fixiranog navbara -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <!-- logo -->
<div class="container justify-content-left">
    <a class="navbar-brand" href="index.php">
      <img src="slike/logo.webp" alt="" width="30" height="50">
    </a>
  </div>
      <!-- pocetna -->
  <div class="container-fluid justify-content-left">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<!-- pravljenje background image-->
<div id="back" class=" align-items-center" >
    <!--naslov i logo-->
    <div class="container-fluid " id="naslov">
    <div class="mb-3 ">
    <a  id="inline" class="navbar-brand" href="index.php">
      <img src="slike/logo.webp" alt="" width="60" height="100">
    </a>
    <h1 id="inline">
        Digital card
    </h1>
    <!-- opis -->
    <p>Digital opener is a game where You can collect trade and buy cards.<br>Start collecting now by registering or logging.</p>
    </div>
</div>
<!-- pravljenje forme sing in -->
<div class="container-fluid bg-white" id="forma">
<div class="mb-3 ">
    <h1 id="inline">
        Register
    </h1>
    </div>
<form class="bg-white" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="mb-3 ">
  <label for="exampleFormControlInput1" class="form-label">Full name</label>
  <input type="text" name="fullname" class="form-control" id="exampleFormControlInput1" placeholder="John Doe">
  <span class="error"> <?php echo $fullnameErr;?></span>
</div>
<div class="mb-3 ">
  <label for="exampleFormControlInput1" class="form-label">Username</label>
  <input type="email" name="user" class="form-control" id="exampleFormControlInput1" placeholder="example@gmail.com">
  <span class="error"><?php echo $usernameErr;?></span>
</div>
<div class="mb-3 ">
<label for="exampleFormControlInput1" class="form-label">Password</label>
  <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Elephant21">
  <span class="error"><?php echo $passwordErr;?></span>
</div>
<div class="mb-3 ">
  <label for="exampleFormControlInput1" class="form-label">Retry Password</label>
  <input type="password" name="password1" class="form-control" id="exampleFormControlInput1" placeholder="Elephant21">
  <span class="error"><?php echo $password1;?></span>

   <!-- Checkbox -->
    <div class="col d-flex justify-content-center">
    <div class="form-check">
        <input class="form-check-input" name="checkbox" type="checkbox" value="" id="checkbox" />
        <label class="form-check-label" id="remember">
             Remember me
        </label>
         </div>
    </div>
    <div class="form-group text-center">
        <button id="regbutton" type="submit" class="btn btn-primary text-center">Submit</button>
    </div>
</div>

</form>
</div>

</div>


  <!--footer -->
  <footer class="bg-light text-lg-start">

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Nikola Obradovic
    </div>
  </footer>
</body>
</html>