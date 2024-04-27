 <?php
session_start();
include("connection.php");

// Check if GET parameters are set
if(isset($_GET['matricule'], $_GET['fname'], $_GET['sname'], $_GET['sexe'], $_GET['sang'], $_GET['poids'], $_GET['naissance'], $_GET['allergie'])) {
    // Retrieve GET parameters
    $matricule = $_GET['matricule'];
    $fname = $_GET['fname'];
    $sname = $_GET['sname'];
    $sexe = $_GET['sexe'];
    $sang = $_GET['sang'];
    $poids = $_GET['poids'];
    $naissance = $_GET['naissance'];
    $allergie = $_GET['allergie'];
} else {
    echo "Some parameters are missing from the URL.";
}

if (isset($_POST["submit_modif"])) {
    // Retrieve form data
    $matricule = $_POST['matricule'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $sexe = $_POST['sexe'];
    $sang = $_POST['sang'];
    $poids = $_POST['poids'];
    $allergie = $_POST['allergie'];

    // Update the record in the database
    $query = "UPDATE patient 
              SET nom_p='$fname',
                  prenom_p='$sname',
                  sexe='$sexe',
                  grp_sang='$sang',
                  poids='$poids',
                  allergie='$allergie'
              WHERE matricule='$matricule'";
              
    $result = mysqli_query($connect, $query);

    if ($result) {
        // Redirect back to profile_patient.php after successful update
        header("Location: profile_patient.php");
        exit(); 
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }
} else {
    // If form is not submitted, redirect to an appropriate page or show an error message
    echo "Form submission error.";
}

mysqli_close($connect);
?>
 
    <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<title>PatientSite</title>
</head>
<body>
	
	<!-- SIDEBAR -->
   
    <?php
  include("side_navbar.php");
  ?>
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
                   
        <form action="bouton.php" method="post">
            <!-- Populate the form fields with existing information -->
            <input type="hidden" name="matricule" value="<?php echo $matricule; ?>">
           
            <div class="form-group">
            <label for="fname">Nom</label>
<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Entrer nom" id="fname" value="<?php echo isset($fname) ? $fname : ''; ?>">
            </div>
            <div class="form-group">
            <label for="sname">Prénom</label>
<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Entrer prénom" id="sname" value="<?php echo isset($sname) ? $sname : ''; ?>">
            </div>
            <div class="form-group">
            <label for="poids">Poids</label>
<input type="number" name="poids" class="form-control" autocomplete="off" placeholder="Entrer poids" id="poids" value="<?php echo isset($poids) ? $poids : ''; ?>">
            </div>
     <div class="form-group">
        <label>Sexe</label>
          <select name="sexe" id="sexe" class="form-select" aria-label="Default select example"> 
            <option value=""></option>
            <option value="Femme" <?php echo (isset($sexe) && $sexe == 'Femme') ? 'selected' : ''; ?>>femme</option>
            <option value="Homme" <?php echo (isset($sexe) && $sexe == 'Homme') ? 'selected' : ''; ?>>homme</option>
         </select>
            </div>
            <div class="form-group">
            <label for="allergie">Allergie</label>
<input type="text" name="allergie" class="form-control" autocomplete="off" placeholder="Entrer allergie" id="allergie" value="<?php echo isset($allergie) ? $allergie : ''; ?>">
            </div>
     <div class="form-group">
        <label for="sang">Sang</label>
          <select name="sang" id="sang" class="form-control"aria-label="Default select example">
            <option value=""></option>
            <option value="A" <?php echo (isset($sang) && $sang == 'A') ? 'selected' : ''; ?>>A</option>
            <option value="B" <?php echo (isset($sang) && $sang == 'B') ? 'selected' : ''; ?>>B</option>
            <option value="AB" <?php echo (isset($sang) && $sang == 'AB') ? 'selected' : ''; ?>>AB</option>
            <option value="O" <?php echo (isset($sang) && $sang == 'O') ? 'selected' : ''; ?>>O</option>
          </select>
            </div>
           
            <button type="submit" name="submit_modif" class="btn btn-primary">Enregistrer</button>
        </form>
    </body>
    </html>
   
