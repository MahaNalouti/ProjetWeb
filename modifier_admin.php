<?php


include("connection.php");
// Vérifier si l'identifiant de l'administrateur à modifier est passé en paramètre
if(isset($_GET['id'])) {
    $id = $_GET['id'];
  
  
    
    // Vous devez établir une connexion à votre base de données ici
    // Remplacez 'votre_hôte', 'votre_nom_utilisateur', 'votre_mot_de_passe' et 'votre_base_de_données' par vos propres informations
   
    // Vérifier la connexion
    if(mysqli_connect_errno()) {
        die("Erreur de connexion à la base de données: " . mysqli_connect_error());
    }


    if (isset($_POST['modif'])) {
       
        $n = $_POST['nom'];
       
        $p = $_POST['prenom'];
       
        $uname = $_POST['uname'];
       
        $pass = $_POST['pass'];
     
        
        $error = array();
        if (strlen($pass)> 20) {
            $error['u'] = "Enter le mot de passe d'admin ";
        } elseif (strlen($n)> 10) {
            $error['u'] = "Enter le nom d'admin";
        } elseif (strlen($p)> 30) {
            $error['u'] = "Enter le prenom d'admin";
        } elseif (strlen($uname)> 30) {
            $error['u'] = "Enter le nom d'utilisateu";
        }
        

        if (isset($error['u'])) {
            $er = $error['u'];
            $show = "<h5 class='text-center alert alert-danger'>$er
             </h5>";
        } else {
            $show = "";
        }
      }

    // Sélectionner l'administrateur à modifier en fonction de son identifiant
    $query = "SELECT * FROM admin WHERE id_a = '$id'";
    $result = mysqli_query($connect, $query);
    
    
    // Vérifier si l'administrateur existe dans la base de données
    if(mysqli_num_rows($result) == 1) {
        // Récupérer les informations de l'administrateur
        $row = mysqli_fetch_assoc($result);
        $nom = $row['nom_a'];
        $prenom = $row['prenom_a'];
        $uname = $row['username'];
        $pass = $row['password'];

    
       
        // Afficher le formulaire de modification avec les informations récupérées


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
           // $id = $_POST['id'];
           /* $n = $_POST['nom'];
            $p = $_POST['prenom'];
            $un = $_POST['uname'];
            $ps = $_POST['pass'];
            */
            
            $sql = "UPDATE admin SET nom_a='$n', prenom_a='$p', username='$uname', password='$pass'  WHERE id_a=$id";
            $result = mysqli_query($connect, $sql);
            if ($result) {
               
               ?>
               <script>alert('Les données de l\'administrateur ont été mises à jour avec succès.');</script>
               <?php
                
            } 
            else {
                ?>
               <script>alert('Erreur lors de la mise à jour des données de l\'administrateur.');</script>
               <?php
               
            }
        
            
            mysqli_close($connect);
        }
    }
}    
    

    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Administrateur</title>
   

    <script>

       function validateForm() {
            var nom = document.getElementsByName("nom")[0].value;
            var prenom = document.getElementsByName("prenom")[0].value;
            var uname = document.getElementsByName("uname")[0].value;
            var pass = document.getElementsByName("pass")[0].value;
            var alpha = /^[a-zA-Z]+$/;

            if (!alpha.test(nom) || nom.trim() == "" || nom.length > 30) {
                alert("Veuillez saisir un nom valide.");
                return false;
            }

            if (!alpha.test(prenom) || prenom.trim() == "" || prenom.length > 30) {
                alert("Veuillez saisir un prénom valide.");
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
    <div class="head">
						<h3>Formmulaire</h3>
						<a href="admin.php" class="btn btn-primary float-end">Retourner</a>
	</div>
    
 <fieldset>
    <legend>Modifier Administrateur</legend>
    <form action="" method="post" id="form" >
       
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="form-group input-control">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" value="<?php echo $nom ?>"><br>
        </div>

        <div class="form-group input-control">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" value="<?php echo $prenom; ?>"><br>
        </div>

        <div class="form-group input-control">
            <label>nom d'utilisateur</label>
            <input type="text" name="uname" class="form-control" autocomplete="off" value="<?php echo $uname; ?>">
        </div>

            <div class="form-group input-control">
                <label>Password</label>
                <input type="password" name="pass" class="form-control" value="<?php echo $pass; ?>">
            </div>

        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" name="modif" class="btn btn-primary" onclick="return validateForm()">Modifier</button>
    </form>
 </fieldset>

<?php

?>


</body>
</html>

