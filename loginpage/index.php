<!doctype html>
<?php
    session_start();
?>  
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Link CSS -->
    <link rel="stylesheet" href="style.css">

    <title>Login</title>
    <link rel="icon" href="../asset/hiasanlogin.png">
  </head>
  <body>
      

      <div class="row ">
          <div class="col">
              <img class="hiasan" src="../asset/hiasanlogin.png" alt="">
          </div>
          <div class="col">
              <div class="box text-center">
                  <h2>LOGIN</h2>
                  <?php 
                  if (isset($_POST['proseslogin'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
    
                    if ($user == 'Samuel' AND $pass == 'arya' ) {
                        $_SESSION['akses']=$user;
                        header("location:../mainmenu/index.php");
                    }
                    elseif($user == 'Bambang' AND $pass == 'hehe'){
                        $_SESSION['akses']=$user;
                        header("location:../mainmenu/index.php");
                    }
                    else{
                        echo"<p>username atau password salah</p>";
                    }
                }?>
                   
                    
                  
                  <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
                      <h5>Username</h5>
                      <input class="input" type="text" name="user">
                      <h5>Password</h5>
                      <input class="input" type="password" name="pass">
                      <br>
                      <input class="tombol" type="submit" name="proseslogin">
                  </form>
              </div>
          </div>
      </div>

  </body>
</html>
