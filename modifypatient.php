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
			<div class="profile">
				<img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="listpatient.php">listpatient</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Modifier Patient</a></li>
			</ul>
			<div class="info-data">
			<div class="container">
    <?php include("message.php"); 
    ?>
	
    <div class="row">
        <div class="col-md-12">
            <div class="card">
			<div class="content-data">
					<div class="head">
						<h2>Modifier Patient</h2>
						<a href="listpatient.php" class="btn-green">Retourner</a>
					</div>
                <div class="card-body">
                <?php
                    if(isset($_POST['matricule_modif'])){
                       $matricule_modif=mysqli_real_escape_string($connect,$_POST['matricule_modif']);
                        $query="SELECT * FROM patient where matricule='$matricule_modif'";
                        $query_run=mysqli_query($connect,$query);
                        if(mysqli_num_rows($query_run)>0){
                            $patient=mysqli_fetch_array($query_run);}

                           
                          }
                      
                             
                          
                      ?>
                     
             <form method="post" action="insert.php" onsubmit="return validateForm()">
              <input type="hidden" name="patient_id" value="<?php echo $patient['matricule']; ?>">
                   <input type="hidden" name="matriculep" value="<?php echo $patient['matricule']?>">
                   <div class="form-group input-control">
                      <label for="Matricule">Matricule</label>
                      <input type="text" name="matricule_modif" id="matricule_modif" class="form-control" 
                      autocomplete="off" placeholder="Entrer matricule" value="<?php echo isset($matricule_modif) ? $matricule_modif : ''; ?>">
                   <div class="error"></div>
                     </div>
                  <div class="form-group">
            <label>Nom</label>
            <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Entrer nom" id="nom" value="<?php echo isset($patient['nom_p']) ? $patient['nom_p'] : ''; ?>">
          </div>
              <div class="form-group">
                 <label>prénom</label>
                 <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Entrer prénom" id="prenom" value="<?php echo isset($patient['prenom_p']) ? $patient['prenom_p'] : ''; ?>">
                </div>
                <div class="form-group">
                 <label>Utilisateur</label>
                 <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Entrer Utilisateur"  id="utilisateur"  value="<?php echo isset($patient['username_p']) ? $patient['username_p'] : ''; ?>">
                   </div>
          <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Entrer mot de passe" id="pass" value="<?php echo isset($patient['pass_p']) ? $patient['pass_p'] : ''; ?>">
			</div>
          <div class="form-group">
            <label>Date de naissance</label>
            <input type="date" name="date" class="form-control" autocomplete="off" id="date"  value="<?php echo $patient['naiss']?>">
          </div>
          <div class="form-group">
            <label>Age</label>
            <input type="number" name="age" class="form-control" autocomplete="off" placeholder="Entrer age" id="age"  value="<?php echo $patient['age']?>">
          </div>
          <div class="form-group">
    <label>Sexe</label>
    <select name="sexe" id="sexe" class="form-select" aria-label="Default select example">
    <option value=""></option>
    <option value="Femme" <?php echo (isset($patient['sexe']) && $patient['sexe'] == 'Femme') ? 'selected' : ''; ?>>Femme</option>
    <option value="Homme" <?php echo (isset($patient['sexe']) && $patient['sexe'] == 'Homme') ? 'selected' : ''; ?> >Homme</option>
</select>
</div>

          <div class="form-group">
            <label>Allergie</label>
            <input type="text" name="allergie" class="form-control" autocomplete="off" placeholder="Entrer allergie" id="allergie" value="<?php echo isset($patient['allergie']) ? $patient['allergie'] : ''; ?>">
          </div>
		
          <div class="form-group">
    <label>Type sanguin</label>
    <select name="sang" id="sang" class="form-control">
    <option value=""></option>
    <option value="A" <?php echo (isset($patient['sang']) && $patient['sang'] == 'A') ? 'selected' : ''; ?>>A</option>
    <option value="B" <?php echo (isset($patient['sang']) && $patient['sang'] == 'B') ? 'selected' : ''; ?>>B</option>
    <option value="AB" <?php echo (isset($patient['sang']) && $patient['sang'] == 'AB') ? 'selected' : ''; ?>>AB</option>
    <option value="O" <?php echo (isset($patient['sang']) && $patient['sang'] == 'O') ? 'selected' : ''; ?>>O</option>
</select>

</div>
<br>

          <div class="form-group">
            <label>Poids</label>
            <input type="number" name="poids" class="form-control" autocomplete="off" placeholder="Entrer poids" id="poids" value="<?php echo isset($patient['poids']) ? $patient['poids'] : ''; ?>">
          </div>
		  <br>
		  <div class="form-group">
          <label >telephone</label>
                    <input type="text" name="tel" class="form-control"
                    autocomplete="off" placeholder="Entrer num" id="tel" value="<?php echo $patient['tel']?>">
                   </div>
				   <br>
          <div class="form-group">
                    <label >Rendez vous</label>
                    <input type="date" name="derr" class="form-control" autocomplete="off" placeholder="Entrer rendezvous" id="derr" value="<?php echo  $patient['der_rdv_p'] ?>">

               </div>
              <div class="error"></div>
             </div>
                
             </div>
            <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" name="submit_modification" class="btn btn-primary">Modifier</button>

            </div>
         </div>
         </div>
         </div>
           </form>
		</div>
	</div>
 </div>
</div>	
</div>
 </main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="patientverif.js"></script>
<script>
    document.getElementById('date').onchange = validateForm;
    validateForm(); // Call after attaching onchange event
</script>
<script src="script.js"></script>
</body>
</html>
