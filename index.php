<?php
session_start();
if(isset( $_SESSION['user'])&& isset($_SESSION['password'])&& isset($_SESSION['fullname']))
{

} 
else
{
    $_SESSION["user"]="";
    $_SESSION["password"]="";
    $_SESSION["fullname"]="";
}
//setcookie($cookie_name, $cookie_value, time() + (86400 * 900), "/"); // 30 days

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>


<?php
include 'konekcija.php';
 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
 /* $Err = "";
  $pass = $user = $name ="";
  $i=0;
  if($_SESSION["user"]==""&&$_SESSION["password"]==""&&$_SESSION["fullname"]="")
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {          
        $pass=test_input($_POST["password"]);
        $user=test_input($_POST["user"]);
        $name=test_input($_POST["fullname"]);
        include 'konekcija.php';
        $sql = "SELECT * FROM User";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              if($row["Username"]==$user&&$row["Password"]==$pass)
              {
                  $i++;
              } else
              {
                  $Err="Ne postoji korisnik sa ovim parametrima!";
              }
              if($i==1)
              {
                  $Err="";
                  break;
              }
          }
      }
      if($Err=="")
      {
          $_SESSION["user"]=$email;
          $_SESSION["password"]=$pass;
          $_SESSION["fullname"]=$name;
      }
    }
}else
{
    session_destroy();
} **/
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
<?php
    if($_SESSION["user"]==""&&$_SESSION["sifra"]==""&&$_SESSION['fullname']=="")//proveravamo da li je sesija neaktivna
 {?>
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
<!-- pravljenje forme log in -->
<div class="container-fluid bg-white" id="forma">
<div class="mb-3 ">
    <h1 id="inline">
        Log in
    </h1>
    </div>
<form class="bg-white" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="mb-3 ">
  <label for="exampleFormControlInput1" class="form-label">Full name</label>
  <input type="text" name="fullname" class="form-control" id="exampleFormControlInput1" placeholder="John Doe">
</div>
<div class="mb-3 ">
  <label for="exampleFormControlInput1" class="form-label">Username</label>
  <input type="email" name="user" class="form-control" id="exampleFormControlInput1" placeholder="example@gmail.com">
</div>
<div class="mb-3 ">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Elephant21">
  
   <!-- Checkbox -->
  <div class="col d-flex justify-content-center">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="checkbox" />
        <label class="form-check-label" id="remember">
             Remember me
        </label>
         </div>
    </div>
         <!--  link za reg -->
  <div id="registerlink" class="col text-center">
     <a href="register.php">Don't have account, create one!</a>
 </div>
 <div class="form-group text-center">
        <button id="regbutton" type="submit" class="btn btn-primary text-center">Submit</button>
      </div>
</div>
</div>
</form>
</div>

</div>
<?php
 }?>

  <!--footer -->
  <footer class="bg-light text-lg-start">

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2022 Nikola Obradovic
    </div>
  </footer>
</body>
</html>