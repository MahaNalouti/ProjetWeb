<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
 
 <title>AdminSite</title>
 <link rel="stylesheet" href="styleM.css">
 <script src="scriptM.js">

 </script>
</head>
<body>
	
 <!-- SIDEBAR -->
 <section id="sidebar">
  <a href="#" class="brand"><i class='bx bxs-smile icon'></i>Hopital Medical</a>
  <ul class="side-menu">
   <li><a href="indexM.php" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>

   <li>
    <a href="admin.php" ><i class='bx bx-table icon' ></i>Admins</a>
    
   </li>


   <li>
    <a href="doctor.php"><i class='bx bx-table icon' ></i>Medecins</a>
    
   </li>

   <li>
    <a href="patient.php"><i class='bx bx-table icon' ></i>Patients</a>
    
   </li>

   <li>
    <a href="render_vous.php"><i class='bx bx-table icon' ></i>Rendez vous</a>
    
   </li>


   <li>
    <a href="rooms.php"><i class='bx bx-table icon' ></i>Salles</a>
    
   </li>

   <li>
    <a href="materiel.php"><i class='bx bx-table icon' ></i>Materiels</a>
    
   </li>


   <li>
    <a href="stock.php"><i class='bx bx-table icon' ></i>Médicaments</a>
    
   </li>

  </ul>
  <ul class="side-menu">
   <li>
    <a href="">
     <i class="bx bx-table icon"></i>
     Parametre
    </a>
   </li>
   <li>
    <a href="logout.php">
     <i class="bx bx-table icon"></i>
     Deconnexion
    </a>
   </li>
  </ul>
  
 </section>
 <!-- SIDEBAR -->

 <!-- NAVBAR -->
 <section id="content">
  <!-- NAVBAR -->
  <nav>
   <i class='bx bx-menu toggle-sidebar' ></i>
   <form action="#">
    <div class="form-group">
     <input type="text" placeholder="Search...">
     <i class='bx bx-search icon' ></i>
    </div>
   </form>
   <a href="#" class="nav-link">
    <i class='bx bxs-bell icon' ></i>
    <span class="badge">5</span>
   </a>
   <a href="#" class="nav-link">
    <i class='bx bxs-message-square-dots icon' ></i>
    <span class="badge">8</span>
   </a>
   <span class="divider"></span>
   <div class="profile">
    <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
    <ul class="profile-link">
     <li><a href="#"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
     <li><a href="#"><i class='bx bxs-cog' ></i> Settings</a></li>
     <li><a href="logout.php"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
    </ul>
   </div>
  </nav>
  <!-- NAVBAR -->
</body>
</html>
