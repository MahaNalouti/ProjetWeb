<?php
session_start();
?>
<!DOCTYPE html> 
<html>
<head>
<title>Tableau de bord d'Admin</title>
</head>
<body>
   <?php
    include("header.php");
    include("connection.php");
   ?>
<div class="container-fluid">
 <div class="col-md-12">
  <div class="row">
   <div class="col-md-2" style="margin-left: -30px;">
     <?php
       include("sidenav.php");
       //include("navbar.php");
     ?>
   </div>
    
    <div class="col-md-10">
        
      <h4 class="my-2">Tableau de bord</h4>
     <div class="col-md-12 my-1">
      <div class="row">  

        <div class="col-md-3 bg-success mx-2" style="height: 130px;"> 
         <div class="col-md-12">
           <div class="row">
             <div class="col-md-8">
                
                <?php
                  $ad = mysqli_query($connect, "SELECT * FROM admin ");
                 $num2 = mysqli_num_rows($ad);
                 //
                ?>
                  <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num2;?></h5> 
                  <h5 class="text-white">Total</h5> 
                  <h5 class="text-white">Admins</h5>
            </div>
            <div class="col-md-4">
                <a hef="#"><i class="fa fa-user-tie fa-3x my-4" style="color: white ;"></i> </a>
                
            </div>
           </div>
         </div>
        </div>
       
       <div class="col-md-3 bg-info mx-2" style="height: 130px;">
        <div class="col-md-12">
           <div class="row">
             <div class="col-md-8">
             <?php
                 $d = mysqli_query($connect, "SELECT * FROM doctor");
                $doct = mysqli_num_rows($d);
                ?>
                  <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $doct; ?></h5>
                  <h5 class="text-white">Total</h5> 
                  <h5 class="text-white">Médecins</h5>
            </div>
            <div class="col-md-4">
                <a hef="patient.php"><i class="fa fa-user-md fa-3x my-4" style="color: white ;"></i> </a>
            </div>
           </div>
         </div> 
        </div>
       
       <div class="col-md-3 bg-warning mx-2" style="height: 130px;">
        <div class="col-md-12">
           <div class="row">
             <div class="col-md-8">
             <?php
                 $p = mysqli_query($connect, "SELECT * FROM patient");
                $pp = mysqli_num_rows($p);
                ?>


                  <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $pp; ?></h5>
                  <h5 class="text-white">Total</h5> 
                  <h5 class="text-white">Patients</h5>
            </div>
            <div class="col-md-4">
                <a hef="#"><i class="fa fa-procedures fa-3x my-4" style="color: white ;"></i></a>
            </div>
           </div>
         </div> 
       </div>

       <div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;">
        <div class="col-md-12">
           <div class="row">
           <div class="col-md-8">
           <?php
                 $s = mysqli_query($connect, "SELECT * FROM rooms where etat='1'");
                $ss = mysqli_num_rows($s);
                ?>
                  <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $ss; ?></h5>
                  <h5 class="text-white">Total</h5> 
                  <h5 class="text-white">Salles libres</h5>
            </div>
            <div class="col-md-4">
                <a hef="#"><i class="fa fa-hospital fa-3x my-4" style="color: white ;"></i></a>
            </div>
           </div>
         </div> 
        
       </div>

       <div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">
        <div class="col-md-12">
           <div class="row">
           <div class="col-md-8">
           <?php
                 $m_g = mysqli_query($connect, "SELECT * FROM mat_generale ");
                 $m_l= mysqli_query($connect, "SELECT * FROM  mat_labour");
                 $opd = mysqli_query($connect, "SELECT * FROM opd ");
                 $j = mysqli_num_rows($m_g);
                 $jj = mysqli_num_rows($m_l);
                 $jjj = mysqli_num_rows($opd);
                 $sum = $j + $jj + $jjj;
                ?>
                  <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $sum; ?></</h5>
                  <h5 class="text-white">Total</h5> 
                  <h5 class="text-white">Materiels disponibles</h5>
            </div>
            <div class="col-md-4">
                <a hef="#"><i class="fa fa-wrench fa-3x my-4" style="color: white ;"></i></a>
            </div>
           </div>
         </div> 
        
       </div>

       <div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;">
        <div class="col-md-12">
           <div class="row">
             <div class="col-md-8">
                 <?php
                  $r = mysqli_query($connect, "SELECT * FROM rendez_vous ");
                  $rd = mysqli_num_rows($r);
                 //
                ?>
                  <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $rd; ?></h5>
                  <h5 class="text-white">Total</h5> 
                  <h5 class="text-white">Rendez-Vous</h5>
            </div>
            <div class="col-md-4">
                <a hef="#"><i class="fa fa-notes-medical fa-3x my-4" style="color: white ;"></i></a>
            </div>
           </div>
         </div> 
        
       </div>

       <div class="col-md-3 bg-info mx-2" style="height: 130px;">
        <div class="col-md-12">
           <div class="row">
             <div class="col-md-8">
             <?php
                 $m = mysqli_query($connect, "SELECT * FROM drugs");
                $mm = mysqli_num_rows($m);
                ?>
                  <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $mm; ?></h5>
                  <h5 class="text-white">Total</h5> 
                  <h5 class="text-white">Médicaments disponibles</h5>
            </div>
            <div class="col-md-4">
                <a hef="#"><i class="fa fa-tablets fa-3x my-4" style="color: white ;"></i></a>
            </div>
           </div>
         </div> 
        
       </div>

      </div>
     </div>
    </div>

    </div>
  </div>
 </div>
</div>
</body>
</html>