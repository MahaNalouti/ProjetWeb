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
				<li><a href="#">Patient</a></li>
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
						<a href="patient.php" class="btn-green">Retourner</a>
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
              
                   <input type="hidden" name="matriculep" value="<?php echo $patient['matricule']?>">
                   <?php echo "sexe from database:" .$patient['sexe']; ?>
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
    <select name="sexe" id="sexe" class="form-select" aria-label="Sexe">
        <option value=""></option>
       
        <option value="Femme" <?php echo ($patient['sexe'] == 'Fem') ? 'selected' : ''; ?>>Femme</option>
        <option value="Homme" <?php echo ($patient['sexe'] == 'Hom') ? 'selected' : ''; ?>>Homme</option>
    </select>
</div>

          <div class="form-group">
            <label>Allergie</label>
            <input type="text" name="allergie" class="form-control" autocomplete="off" placeholder="Entrer allergie" id="allergie" value="<?php echo isset($patient['allergie']) ? $patient['allergie'] : ''; ?>">
          </div>
		
         
<div class="form-group">
    <label>Type sanguin</label>
    <select name="sang" id="sang" class="form-control" aria-label="Type sanguin">
        <option value=""></option>
        <option value="A" <?php echo (isset($patient['grp_sang']) && $patient['grp_sang'] == 'A') ? 'selected' : ''; ?>>A</option>
        <option value="B" <?php echo (isset($patient['grp_sang']) && $patient['grp_sang'] == 'B') ? 'selected' : ''; ?>>B</option>
        <option value="AB" <?php echo (isset($patient['grp_sang']) && $patient['grp_sang'] == 'AB') ? 'selected' : ''; ?>>AB</option>
        <option value="O" <?php echo (isset($patient['grp_sang']) && $patient['grp_sang'] == 'O') ? 'selected' : ''; ?>>O</option>
    </select>
</div>


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
<script src="scriptH.js"></script>
</body>
</html>
