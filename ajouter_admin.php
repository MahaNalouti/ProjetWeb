<?php
session_start();
include("connection.php");
$_SESSION['admin'] = 'username';

if (isset($_POST['add'])) {
    $n = $_POST['nom'];
    $p = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $tel = $_POST['tel'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    //$image = $_FILES['img']['name'];
    $error = array();
    if (empty($n)) {
        $error['u'] = "Enter le nom d'admin";
    } elseif (empty($p)) {
        $error['u'] = "Enter le prenom d'admin";
    } else if (empty($tel)) {
        $error['u'] = "entrez un numero";
    }else if (empty($sexe)) {
        $error['u'] = "entrez le sexe";
    } elseif (empty($uname)) {
        $error['u'] = "Enter Admin Username";
    } else if (empty($pass)) {
        $error['u'] = "Enter Admin Password";
    } 

   if (count($error) == 0) {
        $q = "INSERT INTO admin (nom_a, prenom_a, username, password, sexe ,tel) 
              VALUES ('$n','$p','$uname','$pass','$sexe','$tel')"; 
        $result = mysqli_query($connect, $q);
        echo"<script>alert('Admin Ajouté Avec Succés');</script>";
       
    }else{
        echo"<script>alert('Verifier Les Données');</script>";
    }
}

if (isset($error['u'])) {
    $er = $error['u'];
    $show = "<h5 class='text-center alert alert-danger'>$er
</h5>";
} else {
    $show = "";
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Ajouter médecin</title>

<script>
   function validateForm() {
            var nom = document.getElementsByName("nom").value;
            var prenom = document.getElementsByName("prenom").value;
            var sexe = document.getElementsByName("sexe").value;
            var tel = document.getElementsByName("tel").value;
            var uname = document.getElementsByName("uname").value;
            var pass = document.getElementsByName("pass").value;
            var alpha = /^[a-zA-Z]+$/;

            if (!alpha.test(nom) || nom.trim() == "" || nom.length > 10)
             {
                alert("Veuillez saisir un nom valide.");
                return false;
            }

            if (!alpha.test(prenom) || prenom.trim() == "" || prenom.length > 30) {
                alert("Veuillez saisir un prénom valide.");
                return false;
            }

            if (sexe.trim() == "") {
                alert("Veuillez choisir un sexe .");
                return false;
            }

            if (tel.trim() == "" || tel.length > 30) {
                alert("Veuillez saisir un numero de tél  valide.");
                return false;
            }

            if (uname.trim() == "" || uname.length > 20) {
                alert("Veuillez saisir un nom d'utilisateur valide.");
                return false;
            }

            if (pass.trim() == "" || pass.length > 20) {
                alert("Veuillez saisir un mot de passe valide.");
                return false;
            }

            return true;
        }
</script>
   

</head>

<body>
    <?php
    include("side_navbar.php");
    ?>
    <main>
    <div class="data">
    <div class="content-data">

        

                <h1 class="title">Ajouter Admin</h1>
            <ul class="breadcrumbs">
				<li><a href="admin.php">Admin</a></li>
				<li class="divider">/</li>
				<li><a href="ajouter_admin.php" class="active">Ajouter Admin</a></li>
			</ul>
			

			<div class="data">
                
                
				<div class="content-data">
					<div class="head">
						<h3>Formulaire</h3>
						<a href="admin.php" class="btn btn-primary float-end">Retourner</a>
					</div>
						<div>
                            <form action="" method="post" id="form">
                    
                                <div class="form-group input-control">
                                        <label for="">Nom</label>
                                        <input type="text" name="nom" class="form-control" autocomplete="off">
                                        <div class="error"></div>
                                </div>

                                <div class="form-group input-control">
                                    <label for="" >Prenom</label>
                                    <input type="text" name="prenom" class="form-control" autocomplete="off">
                                    <div class="error"></div>
                                </div>
                                <div class="form-group input-control">
                                    <label for="" >tel</label>
                                    <input type="number" name="tel" class="form-control" autocomplete="off">
                                    <div class="error"></div>
                                </div>
                                <div class="form-group input-control">
                                    <label for="">Sexe</label>
                                    <select name="sexe" id="sexe" class="form-select" aria-label="Default select example" required >
                                        <option value="">Selectionner le sexe</option>
                                        <option value="Femme">Femme</option>
                                        <option value="Homme">Homme</option>
                                    </select>
                                    <div class="error"></div>
                                </div>
                                
                                <div class="form-group input-control">
                                    <label for="" >Nom Utilisateur</label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off" >
                                    <div class="error"></div>
                                </div>
                                <div class="form-group input-control">
                                    <label>Mot De Passe</label>
                                    <input type="password" name="pass" class="form-control" autocomplete="off">
                                    <div class="error"></div>
                                </div>
                
                                </div>
                                <div class="modal-footer">
                                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" name="add" class="btn btn-primary" onclick="return validateForm()">Ajouter</button>
                                 
                                </div>
                            </form>
	                    </div>
					</div>
					
				</div>
			</div>
       
 </main>
</body>

</html>
