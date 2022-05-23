<!doctype html>

<?php
  include "rumus.php";
  session_start();
  // if(empty($_SESSION['akses'])){
  //   echo " mohon login terlebih dahulu";
  // }
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">HealthyApp</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link btn btn-primary tombol" href="logout.php">Logout</a>
              </div>
            </div>
        </div>
      </nav>
      <!-- Akhir navbar -->
      <!-- Jumbotron -->
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Hello, <span><?php echo $_SESSION['akses'] ?></span>! </h1>
          <h5 class="lead">Let's check your Body Mass Index, Daily Calories requirement,
            <br> and we will give you good food for you!</h5>
        </div>
      </div>
      <!-- AKhir Jumbotron -->
      <div class="proses">
        <!-- form -->
        <form class="justify-content-center " action="" method="post">
          <div class=" form">
          <div class="ilusdokter">
            <img src="../asset/dokter.png" alt="">
          </div>
          <div class="form-bucket">
            <!-- gender -->
            <div class="form-box" id="gender-form">
              <h5>Your Gender:</h5>
              <label>
                <input type="radio" name="gender" value="male">
                <img class="gender-img" src="../asset/male.png" alt="">
                <span></span>
              </label>
              <label>
                <input type="radio" name="gender" value="female">
                <img class="gender-img" src="../asset/female.png" alt="">
                <span></span>
              </label>
              </select>
            </div>
            <!-- usia -->
            <div class="col form-box" id="usia-form">
              <h5>Your Age:</h5>
              <input class="input-box" type="text" name="usia" placeholder="age(years old)" >
            </div>
            <!-- berat -->
            <div class="col form-box"id="berat-form">
             <h5>Your Weight:</h5>
              <input class="input-box" type="text" name="berat" placeholder="weight(kg) ">
            </div>
            <!-- tinggi -->
            <div class="col form-box"id="tinggi-form">
              <h5>Your Height:</h5>
              <input class="input-box" type="text" name="tinggi" placeholder="height (cm)">
            </div>
            <input class="submit-form" type="submit" name="submit" value="count it">
          </div>

          <?php
          $gender=@$_POST['gender'];
          $usia=@$_POST['usia'];
          $berat=@$_POST['berat'];
          $tinggi=@$_POST['tinggi'];

          $bulk = array('1. Calories surplus everyday','2. Do some weightlifting workout','3. Dont forget to rest');
          $cut =array('1. Reduce food portions','2. Eat more vegetables and fruit','3. Cardio exercises');
          $maintain=array('1. Dont skip breakfast','2. Eat vegetables and foods that contain protein in small portions','3. Light exercise');
          $pengguna = new rumus;
          $bmi = $pengguna ->hitungBMI($berat,$tinggi);
          $kalori = $pengguna ->hitungKal($gender,$usia,$berat,$tinggi);
          $surplus = $kalori + 300;
          $defisit = $kalori - 200;
          ?>
          <!-- result -->
          <div class="result justify-content-center">
            <div class="result-desc">
              <?php if($kalori ==0): ?>
                <h5 id="be4-isi">Please fill the form</h5>
              <?php endif ?>
              <?php if ($bmi <18.5 and $bmi !=0):?>
                <h5>Body Mass Index: <?php echo "$bmi" ?></h5>
                <h6>Your weight is less than the normal range.<br>  You need <?php echo "$surplus" ?><br> calories to gain your current weight. <br> <br> Follow tips below:</h6>
                <?php foreach($bulk as $value):?>
                  <p><?php echo $value ?></p>
                <?php endforeach ?>
              <?php endif ?>
              <?php if ($bmi >= 18.5 and $bmi<=22.9):?>
                <h5>Body Mass Index: <?php echo "$bmi" ?></h5>
                <h6>Your weight is in the normal range,<br> You need <?php echo "$kalori" ?><br>calories to maintain your current weight. <br> <br> Follow tips below:</h6>
                <?php foreach($maintain as $value):?>
                  <p><?php echo $value ?></p>
                <?php endforeach ?>
              <?php endif ?>
              <?php if ($bmi>=23 and $bmi<=29.9):?>
                <h5>Body Mass Index: <?php echo "$bmi" ?></h5>
                <h6>Your weight is over than the normal range.<br> You need <?php echo "$defisit" ?><br>.. calories to lose your current weight. <br> <br> Follow tips below:</h6>
                <?php foreach($cut as $value):?>
                  <p><?php echo $value ?></p>
                <?php endforeach ?>
              <?php endif ?>
              <?php if ($bmi >30):?>
                <h5>Body Mass Index: <?php echo "$bmi" ?></h5>
                <h6>Your weight is at the obesity level.<br>  You need <?php echo "$defisit" ?><br>.. calories to lose your current weight. <br> <br> Follow tips below:</h6>
                <?php foreach($cut as $value):?>
                  <p><?php echo $value ?></p>
                <?php endforeach ?>
              <?php endif ?>
            </div>
          </div>
        </div>
      </form>

      </div>

    <!-- Saran -->
  </body>
</html>