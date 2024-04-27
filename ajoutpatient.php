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
</head>
<body>
	
	<?php 
     include("side_navbar.php");
  ?>
		<!-- MAIN -->
		<main>
			<h1 class="title">Patient</h1>
			<ul class="breadcrumbs">
				<li><a href="patient.php">Patients</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Ajouter Patient</a></li>
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
						<a href="patient.php" class="btn-green">Retourner</a>
					</div>
                </div>
                <div class="card-body">
                <form method="post" action="insert.php" >
           <div class="form-group input-control">
                    <label >Nom</label>
                    <input type="text" name="fname" class="form-control"
                    autocomplete="off" placeholder="Entrer nom" id="nom">
                   </div>
                   <div class="form-group">
                    <label >prénom</label>
                    <input type="text" name="sname" class="form-control"
                    autocomplete="off" placeholder="Entrer prénom" id="prenom">
                   </div>
                   <div class="form-group">
                    <label >Utilisateur</label>
                    <input type="text" name="uname" class="form-control"
                    autocomplete="off" placeholder="Entrer Utilisateur"  id="utilisateur">
                   </div>
                   <div class="form-group">
                    <label >Mot de passe</label>
                    <input type="password" name="password" class="form-control"
                    autocomplete="off" placeholder="Entrer mot de passe" id="pass" >
                   </div>
                   <div class="form-group">
                    <label >Matricule-cnss</label>
                    <input type="text" name="matricule" class="form-control"
                    autocomplete="off" placeholder="Entrer Mat-cnss"  id="mat">
                   </div>
                   <div class="form-group">
                    <label >Date de naissance</label>
                    <input type="date" name="date" class="form-control" autocomplete="off" id="date" >
                   </div>
                   <div class="form-group">
                    <label >Age</label>
                    <input type="number" name="age" class="form-control"
                    autocomplete="off" placeholder="Entrer age" id="age" >
                   </div>
                   <div class="form-group">
                    <label >sexe</label>
                    <select name="sexe" class="form-control" id="sexe">
                        <option value="" >choisir sexe</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                     </div> 
                   <div class="form-group">
                    <label >Allergie</label>
                    <input type="text" name="allergie" class="form-control"
                    autocomplete="off" placeholder="Entrer allergie" id="allergie" >
                   </div>
                   <div class="form-group">
                    <label >type sanguin</label>
                    <select name="sang" id="sang" id="sang" >
                        <option value="A" >A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                   </div>
                   <div class="form-group">
                    <label >Poids</label>
                    <input type="number" name="poids" class="form-control"
                    autocomplete="off" placeholder="Entrer poids" id="poids">
                   </div>
                   <div class="form-group">
                    <label >telephone</label>
                    <input type="text" name="tel" class="form-control" autocomplete="off"
                     placeholder="Entrer num" id="tel">

                   </div>
                   

            </div>
            <div class="modal-footer">
               <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" name="ajoutM" class="btn btn-primary" onsubmit="return validateForm()">Ajouter </button>
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
<script src="patientverif.js"></script>
<script>
    document.getElementById('date').onchange = validateForm;
    validateForm(); // Call after attaching onchange event
</script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="script.js"></script>
</body>
</html>
