<?php
session_start();
$_SESSION['admin'] = 'username';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Stock</title>
    <script src="drugverification.js"></script>
</head>

<body>
    <?php
    include("side_navbar.php");
    ?>
    <main>
        <div class="data">
            <div class="content-data">
                <div>
                    <?php
                    include("connection.php");
                    ?>
                    <div class="head"></div>
                    <div class="menu">
                        <h1 class="text-center">Touts les Médicaments</h1>
                        <?php
                        if(isset($_POST['remove_id'])) {
                            $remove_id = $_POST['remove_id'];
                            $sql = "DELETE FROM drugs WHERE id_drug = $remove_id";
                            $result = mysqli_query($connect, $sql);
                            if($result) {
                                echo "<div class='alert alert-success' role='alert'>élement supprimé avec succès</div>";
                            } else {
                                echo "<div class='alert alert-danger' role='alert'>Échec de la suppression de l'élément</div>";
                            }
                        }

                        $req1 = "SELECT * FROM drugs ORDER BY id_drug ASC"; 
                        $res1 = mysqli_query($connect, $req1);
                        if (mysqli_num_rows($res1) < 1) {
                            echo "<h5 class='text-center'> Aucun médicament trouvé</h5>";
                        } else {
                            echo "<table class='table table-bordered'>";
                            echo "<thead><th>ID</th><th>Nom du medicament</th><th>Action</th></thead>";
                            while ($row = mysqli_fetch_array($res1)) {
                                echo "<tr><td>{$row['id_drug']}</td><td>{$row['drug_name']}</td><td><form method='post'><input type='hidden' name='remove_id' value='{$row['id_drug']}'><button type='submit' class='btn btn-danger'>Remove</button></form></td></tr>";
                            }
                            echo "</table>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="content-data">
                <div>
                    <h1 class="text-center">Ajouter un médicament</h1>
                    <?php
                    if (isset($_POST["add"])) {
                        $drug = strtolower(trim($_POST["name"])); // Convert to lower case and trim
                        $errors = 0;
                        if (empty($drug)) {
                            $errors++;
                            print("<div class='alert alert-danger' role='alert'> Ajoutez le nom du médicament s'il vous plaît </div>");
                        }
                        if ($errors == 0) {
                            // Check if the drug already exists in the database
                            $reqverif = "SELECT * FROM drugs WHERE LOWER(drug_name)='$drug'"; // Compare in lower case
                            $resverif = mysqli_query($connect, $reqverif);
                            if (mysqli_num_rows($resverif) == 0) {
                                $req2 = "INSERT INTO drugs (drug_name) VALUES ('$drug')";
                                $res2 = mysqli_query($connect, $req2);
                                if ($res2) {
                                    echo "<div class='alert alert-success' role='alert'> Médicament ajouté avec succès </div>";
                                } else {
                                    echo "<div class='alert alert-danger' role='alert'> Échec de l'ajout du médicament </div>";
                                }
                            } else {
                                print("<div class='alert alert-danger' role='alert'> Le médicament existe déjà dans la base de données </div>");
                            }
                        }
                    }
                    ?>
                    <form action="" method="post">
                        <label for="name">Nom du médicament</label>
                        <input type="text" name="name" id="name" class="form-control" autocomplete="off">
                        <input type="submit" class="btn btn-success mt-3" value="Add Drug" name="add" onclick="verifdrug()">
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
