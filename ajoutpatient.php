<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">
	<title>Tableau de bord</title>
  <script>
    
    function validateForm() {
    var dateOfBirth = document.getElementById('date').value;
    var age = document.getElementById('age').value;

    var currentDate = new Date();
    var selectedDate = new Date(dateOfBirth);
    
    // Calculate age from date of birth
    var dobYear = selectedDate.getFullYear();
    var currentYear = currentDate.getFullYear();
    var calculatedAge = currentYear - dobYear;
    
    // Check if the calculated age matches the entered age
    if (calculatedAge != parseInt(age)) {
        alert('L\'âge saisi ne correspond pas à la date de naissance.');
        return false;
    }
    
    if (selectedDate > currentDate) {
        alert('Date de naissance doit être antérieure à la date actuelle.');
        return false;
    }
    
    if (parseInt(age) < 0 || parseInt(age) > 150) {
        alert('Veuillez saisir un âge valide.');
        return false;
    }
    
    var poidsValue = parseFloat(document.getElementById('poids').value);
    
    if (poidsValue <= 0 || isNaN(poidsValue)) {
        alert('Le poids doit être positif.');  
        return false; 
    }
    
    // If all validations pass, return true
    return true;
}
    

</script>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
  <a href="#" class="brand"><i class='bx bxs-smile icon'></i>Hopitale</a>
		<ul class="side-menu">
			<li><a href="#" class="active" ><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li>
				<a href="#" ><i class='bx bx-table icon' ></i>Admins<i class='bx bx-chevron-right icon-right' ></i></a>
				
			</li>
			<li>
				<a href="#"><i class='bx bx-table icon' ></i>Médecins<i class='bx bx-chevron-right icon-right' ></i></a>
				
			</li>
			<li>
				<a href="#"><i class='bx bx-table icon' ></i>Patients<i class='bx bx-chevron-right icon-right' ></i></a>
				
			</li>
			<li>
				<a href="#"><i class='bx bx-table icon' ></i>Rendez vous<i class='bx bx-chevron-right icon-right' ></i></a>
				
			</li>
			<li>
				<a href="#"><i class='bx bx-table icon' ></i>Salles<i class='bx bx-chevron-right icon-right' ></i></a>
				
			</li>
			<li>
				<a href="#"><i class='bx bx-table icon' ></i>Matériels<i class='bx bx-chevron-right icon-right' ></i></a>
				
			</li>
			<li>
				<a href="#"><i class='bx bx-table icon' ></i>Médicaments<i class='bx bx-chevron-right icon-right' ></i></a>
				
			</li>
			
		</ul>
		<ul class="side-menu">
		
			<li>
			<a href="">
					<i class="bx bx-table icon"></i>Paramétre</a>
				<a href="">
					<i class="bx bx-table icon"></i>Deconnexion</a>
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
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Ajouter Patient</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Tableau de bord</a></li>
			</ul>
			<div class="info-data">
			<div class="container">
    <?php include("message.php"); 
    ?>
	
   
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="head">
						<h2>Ajouter Patient</h2>
						<a href="listpatient.php" class="btn-green">Retourner</a>
					</div>
                </div>
                <div class="card-body">
                <form method="post" action="insert.php" onsubmit="return validateForm()">
           <div class="form-group input-control">
                    <label >Nom</label>
                    <input type="text" name="fname" class="form-control"
                    autocomplete="off" placeholder="Entrer nom" id="nom"required pattern="[a-zA-Z ]+">
                   </div>
                   <div class="form-group">
                    <label >prénom</label>
                    <input type="text" name="sname" class="form-control"
                    autocomplete="off" placeholder="Entrer prénom" id="prenom"required pattern="[a-zA-Z ]+">
                   </div>
                   <div class="form-group">
                    <label >Utilisateur</label>
                    <input type="text" name="uname" class="form-control"
                    autocomplete="off" placeholder="Entrer Utilisateur"  id="utilisateur"required>
                   </div>
                   <div class="form-group">
                    <label >Mot de passe</label>
                    <input type="password" name="password" class="form-control"
                    autocomplete="off" placeholder="Entrer mot de passe" id="pass" minlength="6" maxlength="12"   required  >
                   </div>
                   <div class="form-group">
                    <label >Matricule-cnss</label>
                    <input type="number" name="matricule" class="form-control"
                    autocomplete="off" placeholder="Entrer Mat-cnss"  id="mat"required>
                   </div>
                   <div class="form-group">
                    <label >Date de naissance</label>
                    <input type="date" name="date" class="form-control" autocomplete="off" id="date" required>
                   </div>
                   <div class="form-group">
                    <label >Age</label>
                    <input type="number" name="age" class="form-control"
                    autocomplete="off" placeholder="Entrer age" id="age"required >
                   </div>
                   <div class="form-group">
                    <label >sexe</label>
                    <select name="sexe" class="form-control" id="sexe">
                        <option value="" >choisir sexe</option>
                        <option value="masculin">Masculin</option>
                        <option value="feminin">Féminin</option>
                    </select>
                     </div> 
                   <div class="form-group">
                    <label >Allergie</label>
                    <input type="text" name="allergie" class="form-control"
                    autocomplete="off" placeholder="Entrer allergie" id="allergie"required >
                   </div>
                   <div class="form-group">
                    <label >type sanguin</label>
                    <select name="sang" id="sang" id="sang" >
                        <option value=A >A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="o">O</option>
                    </select>
                   </div>
                   <div class="form-group">
                    <label >Poids</label>
                    <input type="number" name="poids" class="form-control"
                    autocomplete="off" placeholder="Entrer poids" id="poids"required>
                   </div>
                   <div class="form-group">
                    <label >telephone</label>
                    <input type="text" name="tel" class="form-control" autocomplete="off"
                     placeholder="Entrer num" id="tel"required>

                   </div>
                   <div class="form-group">
                    <label >Rendez vous</label>
                    <input type="date" name="derr" class="form-control"
                    autocomplete="off" placeholder="Entrer rendezvous" id="derr"required >
                   </div>

            </div>
            <div class="modal-footer">
               <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
               <button type="submit" id="ajouterBtn" name="ajoutM" class="btn btn-primary" >Ajouter  </button>

                 </div>
       

      </form>
    </div>
  </div>
</div>
  </div>
</div>
			
		</main>
	</section>
	
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="script.js"></script>
</body>
</html>
