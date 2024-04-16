<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
 <link rel="stylesheet" href="style.css">
 <title>AdminSite</title>
 <link rel="stylesheet" href="styleM.css">
 <script src="scriptM.js">

 </script>
</head>
<body>
<?php include("side_navbar.php"); ?>
	
 <!-- SIDEBAR -->
 
 <!-- SIDEBAR -->

 <!-- NAVBAR -->

  <!-- NAVBAR -->
  
 
  <!-- NAVBAR -->

  <!-- MAIN -->
  <main>
  <?php
    //include("../hiba/headerAD.php");
    include("../hiba/connection.php");
   
   ?>

   <h1 class="title">Dashboard</h1>
   <ul class="breadcrumbs">
    <li><a href="#">Page d'accueil</a></li>
    <li class="divider">/</li>
    <li><a href="#" class="active">Tableau de bord</a></li>
   </ul>

   <div class="info-data">

    <div class="card">
     <div class="head">
      <div>
      <?php
                  $ad = mysqli_query($connect, "SELECT * FROM admin ");
                 $num2 = mysqli_num_rows($ad);
                 //
        ?>
       <h2><?php echo $num2; ?></h2>
       <p>Admins</p>
      </div>
      <i class='bx bx-trending-up icon' ></i>
      
     </div>
    </div>


    <div class="card">
     <div class="head">
      <div>
      <?php
                 $d = mysqli_query($connect, "SELECT * FROM doctor");
                $doct = mysqli_num_rows($d);
                ?>
       <h2><?php echo $doct; ?></h2>
       <p>Médecins</p>
      </div>
      <i class='bx bx-trending-down icon down' ></i>
     </div>
    </div>


    <div class="card">
     <div class="head">
      <div>
      <?php
                 $p = mysqli_query($connect, "SELECT * FROM patient");
                $pp = mysqli_num_rows($p);
     ?>
       <h2><?php echo $pp; ?></h2>
       <p>Patients</p>
      </div>
      <i class='bx bx-trending-up icon' ></i>
     </div>
    </div>


    <div class="card">
     <div class="head">
      <div>
      <?php
                  $r = mysqli_query($connect, "SELECT * FROM rendez_vous ");
                  $rd = mysqli_num_rows($r);
                 //
       ?>
       <h2><?php echo $rd; ?></h2>
       <p>Rendez_vous</p>
      </div>
      <i class='bx bx-trending-up icon' ></i>
     </div>
    </div>
   </div>

   



   <div class="info-data">

<div class="card">
 <div class="head">
  <div>
  <?php
                 $s = mysqli_query($connect, "SELECT * FROM rooms where etat='0'");
                $ss = mysqli_num_rows($s);
   ?>
   <h2><?php echo $ss; ?></h2>
   <p>Salles Libres</p>
  </div>
  <i class='bx bx-trending-up icon' ></i>
 </div>
</div>


<div class="card">
 <div class="head">
  <div>
  <?php
                 $m_g = mysqli_query($connect, "SELECT * FROM mat_generale ");
                 $m_l= mysqli_query($connect, "SELECT * FROM  mat_labour");
                 $opd = mysqli_query($connect, "SELECT * FROM opd ");
                 $j = mysqli_num_rows($m_g);
                 $jj = mysqli_num_rows($m_l);
                 $jjj = mysqli_num_rows($opd);
                 $sum = $j + $jj + $jjj;
   ?>
   <h2><?php echo $sum; ?></h2>
   <p>Materiels dispo</p>
  </div>
  <i class='bx bx-trending-down icon down' ></i>
 </div>
</div>

<div class="card">
 <div class="head">
  <div>
  <?php
                 $m = mysqli_query($connect, "SELECT * FROM drugs");
                $mm = mysqli_num_rows($m);
  ?>
   <h2><?php echo $mm; ?></h2>
   <p>Médicaments dispo</p>
  </div>
  <i class='bx bx-trending-up icon' ></i>
 </div>
</div>




  </main>
  <!-- MAIN -->

 <!-- NAVBAR -->

 <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
 <script src="script.js"></script>
</body>
</html>