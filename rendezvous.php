<?php
session_start();
include("connection.php");

$uname = $_SESSION['Patient'];
$query = "SELECT * FROM patient WHERE username_p='$uname'";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($connect));
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
    </head>
    <body>
    <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<title>PatientSite</title>
</head>
<body>
<?php
  include("navbarpatient.php");
  ?>
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
