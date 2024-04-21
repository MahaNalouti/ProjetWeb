<?php
session_start();
include("include/connection.php");

if(isset($_GET['matricule'], $_GET['fname'], $_GET['sname'], $_GET['sexe'], $_GET['sang'], $_GET['poids'], $_GET['naissance'], $_GET['allergie'])) {
    $matricule = $_GET['matricule'];
    $fname = $_GET['fname'];
    $sname = $_GET['sname'];
    $sexe = $_GET['sexe'];
    $sang = $_GET['sang'];
    $poids = $_GET['poids'];
    $naissance = $_GET['naissance'];
    $allergie = $_GET['allergie'];
}else {
    echo "Some parameters are missing from the URL.";
}
if (isset($_POST["submit_modif"])) {
    // Retrieve form data
    $matricule = $_POST['matricule_modif'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $sexe = $_POST['sexe'];
    $sang = $_POST['sang'];
    $poids = $_POST['poids'];
    $naissance = $_POST['naiss'];
    $allergie = $_POST['allergie'];

    // Update the record in the database
    $query = "UPDATE patient SET nom_p='$fname', prenom_p='$sname', sexe='$sexe', grp_sang='$sang', poids='$poids', naiss='$naissance', allergie='$allergie' WHERE matricule='$matricule'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "Modification avec succès!!";
        header("Location: profile_patient.php");
        exit(); 
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }
} else {
    echo "error";
}

mysqli_close($connect);
?>

  
 
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
        <body>
         <main>
			<h1 class="title">Dashboard</h1>
           
			<ul class="breadcrumbs">
				<li><a href="profile_patient.php">profile</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">modification</a></li>
			</ul>
            <br>
			<div class="info-data">
				<div class="card">
                        <div class="col-md-10">
                        <div class="head">
						<h2>Modifier Mes informations</h2>
						<a href="profile_patient.php" class="btn-green">Retourner</a>
					</div>
                    <div class="row" >
                   <br>
        <form action="bouton.php" method="post">
            <!-- Populate the form fields with existing information -->
            <input type="hidden" name="matricule" value="<?php echo $matricule; ?>">
            <div class="form-group input-control">
            <label for="matricule_modif">Matricule</label>
<input type="text" name="matricule_modif" id="matricule_modif" class="form-control" autocomplete="off" placeholder="Entrer matricule" value="<?php echo isset($matricule) ? $matricule : ''; ?>">
            </div>
            <div class="form-group">
            <label for="fname">Nom</label>
<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Entrer nom" id="fname" value="<?php echo isset($fname) ? $fname : ''; ?>">
            </div>
            <div class="form-group">
            <label for="sname">Prénom</label>
<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Entrer prénom" id="sname" value="<?php echo isset($sname) ? $sname : ''; ?>">
            </div>
            <div class="form-group">
            <label for="naiss">Date de naissance</label>
<input type="date" name="naiss" class="form-control" autocomplete="off" id="naiss" value="<?php echo isset($naissance) ? $naissance : ''; ?>">
            </div>
            <div class="form-group">
            <label for="poids">Poids</label>
<input type="number" name="poids" class="form-control" autocomplete="off" placeholder="Entrer poids" id="poids" value="<?php echo isset($poids) ? $poids : ''; ?>">
            </div>
     <div class="form-group">
        <label>Sexe</label>
          <select name="sexe" id="sexe" class="form-select" aria-label="Default select example"> 
            <option value=""></option>
            <option value="Femme" <?php echo (isset($sexe) && $sexe == 'Femme') ? 'selected' : ''; ?>>Femme</option>
            <option value="Homme" <?php echo (isset($sexe) && $sexe == 'Homme') ? 'selected' : ''; ?>>Homme</option>
         </select>
            </div>
            <div class="form-group">
            <label for="allergie">Allergie</label>
<input type="text" name="allergie" class="form-control" autocomplete="off" placeholder="Entrer allergie" id="allergie" value="<?php echo isset($allergie) ? $allergie : ''; ?>">
            </div>
     <div class="form-group">
        <label for="sang">Sang</label>
          <select name="sang" id="sang" class="form-control">
            <option value=""></option>
            <option value="A" <?php echo (isset($allergie) && $allergie == 'A') ? 'selected' : ''; ?>>A</option>
            <option value="B" <?php echo (isset($allergie) && $allergie == 'B') ? 'selected' : ''; ?>>B</option>
            <option value="AB" <?php echo (isset($allergie) && $allergie == 'AB') ? 'selected' : ''; ?>>AB</option>
            <option value="O" <?php echo (isset($allergie) && $allergie == 'O') ? 'selected' : ''; ?>>O</option>
          </select>
            </div>
           
            <button type="submit" name="submit_modif">Enregistrer</button>
        </form>
    </body>
    </html>
   
