<?php
session_start();
include("include/connection.php");

$uname = $_SESSION['Patient'];
$query = "SELECT * FROM patient WHERE username_p='$uname'";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Check if user exists
if (mysqli_num_rows($result) > 0) {
    // User exists, fetch and display information
    $row = mysqli_fetch_assoc($result);
    $matricule = $row['matricule'];
    $fname = $row['nom_p'];
    $sname = $row['prenom_p'];
   

    // Now let's retrieve the appointments for this patient
    $appointments_query = "SELECT rendez_vous.*, patient.nom_p, patient.prenom_p 
                       FROM rendez_vous, patient
                       WHERE rendez_vous.mat_cnss = patient.matricule
                       AND rendez_vous.mat_cnss='$matricule'";

    $appointments_result = mysqli_query($connect, $appointments_query);

    ?>

    <!DOCTYPE html> 
    <html>
    <head>
    <title>Profile</title>
   
    </head>
    <body>
    <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">
	<title>PatientSite</title>
</head>
<body>
	
	<!-- SIDEBAR -->
    <section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i>Hopital Medical</a>
		<ul class="side-menu">
			<li><a href="profile.php" class="active"><i class='bx bxs-dashboard icon' ></i>Tableau de bord </a></li>
			<li><a href="profile_patient.php"><i class="bx bx-table icon"></i>Profile</a></li>
			<li><a href="rendezvous.php"><i class="bx bx-table icon"></i>Rendez_vous</a></li>
            
			
			
		<ul class="side-menu">
			<li><a href="logout (1).php"><i class="bx bx-table icon"></i>Deconnexion</a></li>
		</ul>
		
	</section>
	<section id="content">
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
				
			</div>
		</nav>
        <main>
			<h1 class="title">Dashboard</h1>
           
			<ul class="breadcrumbs">
				<li><a href="profile.php"> Tableau de bord</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Rendez_vous</a></li>
			</ul>
			<div class="info-data">
				<div class="card">
					<div class="head">
						<div>
                        <div class="col-md-10">
                    <h2 class="text-center my-2">Mes Rendez_vous</h2>
                    </div>
                      <br>
                    <div class="row" >
       <table class='table table-bordered'>
           <tr>
               <th>Matricule</th>
               <th>Nom utilisateur</th>
               <th>Prenom utilisateur</th>
               <th>Date Rendez Vous</th>
               <th>Spécialité</th>
               <th>Heure</th>
               <th>Actions</th>
           </tr>
           <?php
           // Check if there are any appointments returned
           if(mysqli_num_rows($appointments_result) > 0) {
               // Loop through the appointments and display them in the table
               while($appointment_row = mysqli_fetch_assoc($appointments_result)) {
                   ?>
                   <tr>
                       <td><?php echo $appointment_row['mat_cnss'];?></td>
                       <td><?php echo $appointment_row['nom_p'];?></td>
                       <td><?php echo $appointment_row['prenom_p'];?></td>
                       <td><?php echo $appointment_row['date'];?></td>
                       <td><?php echo $appointment_row['specialite'];?></td>
                       <td><?php echo $appointment_row['heure'];?></td>
                       <td>
                           <button type="button"  name="btn_supp"class="btn btn-danger deletebtn" onclick="deleteRendezvous('<?php echo $appointment_row['mat_cnss']; ?>')">Supprimer</button>
                       </td>
                   </tr>
                   <?php
               }
           } else {
               echo "<tr><td colspan='7'>Aucun rendez-vous trouvé</td></tr>";
           }
           ?>
       </table>
       </div>
                </div>
            </div>
        </div>
       </div>
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    <script>
        function deleteRendezvous(matricule) {
            if (confirm("Êtes-vous sûr de vouloir supprimer ce rendez-vous?")) {
                window.location.href = "delete_rendezvous.php?matricule=" + matricule;
            }
        }
    </script>
    <script src="script.js"></script>
    </body>
    </html>

    <?php
} else {
    echo "User not found or session variable not set.";
}
mysqli_close($connect);
?>
