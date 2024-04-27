<?php
session_start();
include("connection.php");
$_SESSION['admin'] = 'username';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Ajouter médecin</title>
    <script>
         function validateForm() {
            var nom = document.getElementsByName("nom")[0].value;
            var prenom = document.getElementsByName("prenom")[0].value;
            var uname = document.getElementsByName("uname")[0].value;
            var pass = document.getElementsByName("pass")[0].value;
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
        <h1 class="title">Admin</h1>
        <ul class="breadcrumbs">
				<li><a href="admin.php">Admin</a></li>
				<li class="divider">/</li>
				<li><a href="modifier_admin.php" class="active">Modifier Admin</a></li>
			</ul>

        <div class="data">
            <div>
                <?php
                // include("message.php");
                ?>
            </div>
            <div class="content-data">
                <div class="head">
                    <h3>Formmulaire</h3>
                    <a href="admin.php" class="btn btn-primary float-end">Retourner</a>
                </div>
                <div>
                    <?php
                    if (isset($_POST['modif'])) {
                        $id = mysqli_real_escape_string($connect, $_POST['modif']);
                        $query = "SELECT * FROM admin where id_a ='$id'";
                        $query_run = mysqli_query($connect, $query);
                        if (mysqli_num_rows($query_run) > 0) {
                            $row = mysqli_fetch_array($query_run);
                    ?>
                            <form action="" method="post" id="form">
                                <input type="hidden" name="id" value="<?php echo $row['id_a'] ?>">
                                <div class="form-group input-control">
                                    <label for="">Nom</label>
                                    <input type="text" name="nom" id="Nom" class="form-control" autocomplete="off" placeholder="Entrer nom" value="<?php echo $row['nom_a'] ?>" required>
                                    <div class="error"></div>
                                </div>

                                <div class="form-group input-control">
                                    <label for="">Prenom</label>
                                    <input type="text" name="prenom" id="Prenom" class="form-control" autocomplete="off" value="<?php echo $row['prenom_a'] ?>" required>
                                    <div class="error"></div>
                                </div>

                                <div class="form-group input-control">
							       <label for="">Sexe</label>
							       <select name="sexe" id="sexe" class="form-select" aria-label="Default select example" required >
								     <option value=""></option>
								     <option value="Femme" <?php echo ($row['sexe'] == 'Femme') ? 'selected' : ''; ?>>Femme</option>
								     <option value="Homme" <?php echo ($row['sexe'] == 'Homme') ? 'selected' : ''; ?> >Homme</option>
							       </select>
							       <div class="error"></div>
							    </div>
                            <div class="form-group input-control">
                                    <label for="">Télephone</label>
                                    <input type="number" name="tel" id="tel" class="form-control" 
                                    autocomplete="off" value='<?php echo $row['tel']?>' required >
                                    <div class="error"></div>
                            </div>

                                <div class="form-group input-control">
                                    <label for="">Nom Utilisateur</label>
                                    <input type="text" name="uname" id="Unom" class="form-control" autocomplete="off" value="<?php echo $row['username'] ?>" required>
                                    <div class="error"></div>
                                </div>
                                <div class="form-group input-control">
                                    <label for="">Mot De Passe</label>
                                    <input type="text" name="pass" id="pass" class="form-control" autocomplete="off" value="<?php echo $row['password'] ?>" required>
                                    <div class="error"></div>
                                </div>
                                <button type="submit" name="submit_modif" class="btn btn-primary">Modifier </button>
                            </form>
                    <?php
                        } else {
                            echo "<h4>Admin non trouvé</h4>";
                        }
                    }

                    if (isset($_POST['submit_modif'])) {
                        $id = $_POST['id'];
                        $n = $_POST['nom'];
                        $p = $_POST['prenom'];
                        $tel = $_POST['tel'];
                        $sexe = $_POST['sexe'];
                        $uname = $_POST['uname'];
                        $pass = $_POST['pass'];
                        $error = array();
                        if (empty($n)) {
                            $error['u'] = "Enter le nom d'admin";
                        } elseif (empty($p)) {
                            $error['u'] = "Enter le prenom d'admin";
                        }else if (empty($tel)) {
                            $error['u'] = "entrez un numero";
                        }else if (empty($sexe)) {
                            $error['u'] = "entrez le sexe";
                        }elseif (empty($uname)) {
                            $error['u'] = "Enter Admin Username";
                        } else if (empty($pass)) {
                            $error['u'] = "Enter Admin Password";
                        } //else if (empty($image)) {
                           // $error['u'] = "entrez une photo";
                       // }



                        if(count($error) == 0){
                            $q = "UPDATE admin SET nom_a='$n', prenom_a='$p', username='$uname', password='$pass',  sexe='$sexe' ,tel='$tel' WHERE id_a=$id";
                            $query = mysqli_query($connect, $q);
                            echo"<script>alert('Admin Modifié Avec Succés');</script>";

                        }
                        else {
                            echo"<script>alert('vérifiez Les Coordonnées');</script>";
                        }
                      
                        
                       
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
