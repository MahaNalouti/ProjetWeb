<?php
session_start();
$_SESSION['admin'] = 'username';
include("connection.php");

// Function to remove equipment from the database
function removeEquipment($tableName, $idField, $id) {
    global $connect;
    $req = "DELETE FROM $tableName WHERE $idField = $id";
    $res = mysqli_query($connect, $req);
    return $res;
}

// Function to check if equipment already exists in the database
function equipmentExists($tableName, $fieldName, $value) {
    global $connect;
    $req = "SELECT * FROM $tableName WHERE LOWER($fieldName) = LOWER('$value')";
    $res = mysqli_query($connect, $req);
    return mysqli_num_rows($res) > 0;
}

// Function to add equipment to the database
function addEquipment($tableName, $fieldName, $value) {
    global $connect;
    $insert_req = "INSERT INTO $tableName ($fieldName) VALUES ('$value')";
    $insert_res = mysqli_query($connect, $insert_req);
    return $insert_res;
}

if(isset($_POST['remove_general'])) {
    $id_general = $_POST['remove_general'];
    $removed = removeEquipment('mat_generale', 'id_mat_g', $id_general);
    if($removed) {
        echo" <script>alert('Équipement supprimé avec succès de la catégorie Général.');</script>";
    } else {
        echo" <script>alert('Échec de la suppression de l'équipement de la catégorie Général.');</script>";
    }
}

if(isset($_POST['remove_labour'])) {
    $id_labour = $_POST['remove_labour'];
    $removed = removeEquipment('mat_labour', 'id_labour', $id_labour);
    if($removed) {
        echo "<div class='alert alert-success' role='alert'>Équipement supprimé avec succès de la catégorie Travail.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Échec de la suppression de l'équipement de la catégorie Travail.</div>";
    }
}

if(isset($_POST['remove_opd'])) {
    $id_opd = $_POST['remove_opd'];
    $removed = removeEquipment('opd', 'id_opd', $id_opd);
    if($removed) {
        echo" <script>alert('Équipement supprimé avec succès de la catégorie OPD.');</script>";   
    } else {
        echo" <script>alert('Échec de la suppression de l'équipement de la catégorie OPD.');</script>";
    }
}

// Function to handle adding equipment
function handleAddEquipment($postName, $tableName, $fieldName) {
    if(isset($_POST[$postName])) {
        $equipment_name = strtolower(trim($_POST[$postName]));
        if(empty($equipment_name)) {
            echo" <script>alert('Veuillez entrer le nom de l'équipement.');</script>"; 
        } else {
            if(equipmentExists($tableName, $fieldName, $equipment_name)) {
                echo" <script>alert('L'équipement existe déjà dans cette catégorie.');</script>"; 
            } else {
                $added = addEquipment($tableName, $fieldName, $equipment_name);
                if($added) {
                    echo" <script>alert('Équipement ajouté avec succès à la catégorie.');</script>";   
                } else {
                    echo" <script>alert('Échec de l'ajout d'équipement à la catégorie.');</script>";
                }
            }
        }
    }
}

// Check if add button is clicked for General Equipments
handleAddEquipment('add_general', 'mat_generale', 'nom_g');

// Check if add button is clicked for Labour Equipments
handleAddEquipment('add_labour', 'mat_labour', 'name_labour');

// Check if add button is clicked for OPD Equipments
handleAddEquipment('add_opd', 'opd', 'name_opd');

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <script src="drugverification.js"></script>
</head>

<body>
    <?php
    include("side_navbar.php");
    ?>
    <main>
        <div class="info-data">
            <div class="card">
                <h1 class="text-center">Équipements généraux</h1>
                <?php
                // Query to fetch equipment from mat_generale table
                $req1 = "SELECT * FROM `mat_generale` ORDER BY `mat_generale`.`id_mat_g` ASC";
                $res1 = mysqli_query($connect, $req1);

                // Display equipment from mat_generale table
                if (mysqli_num_rows($res1) > 0) {
                    echo "<table class='table table-bordered'>";
                    echo "<thead><th>ID</th><th>Nom de l'équipement</th><th>Action</th></thead>";
                    while ($row = mysqli_fetch_array($res1)) {
                        echo "<tr><td>{$row['id_mat_g']}</td><td>{$row['nom_g']}</td><td>";
                        echo "<form action='' method='post'>";
                        echo "<input type='hidden' name='remove_general' value='{$row['id_mat_g']}'>";
                        echo "<button type='submit' class='btn btn-danger'>Retirer</button>";
                        echo "</form>";
                        echo "</td></tr>";
                    }
                    echo "</table>";
                }
                ?>
                <!-- Add form for General Equipments -->
                <form action="" method="post">
                    <input type="text" name="general_equipment" placeholder="New Equipment Name" id="general" style="width: 250px;">
                    <input type="submit" class="btn btn-success" value="Ajouter un équipement général" name="add_general" onclick="verifmatgen()">
                </form>
            </div>

            <div class="card">
                <h1 class="text-center">Équipements de travail</h1>
                <?php
                // Query to fetch equipment from mat_labour table
                $req2 = "SELECT * FROM mat_labour ORDER BY id_labour ASC";
                $res2 = mysqli_query($connect, $req2);

                // Display equipment from mat_labour table
                if (mysqli_num_rows($res2) > 0) {
                    echo "<table class='table table-bordered'>";
                    echo "<thead><th>ID</th><th>Nom de l'équipement</th><th>Action</th></thead>";
                    while ($row = mysqli_fetch_array($res2)) {
                        echo "<tr><td>{$row['id_labour']}</td><td>{$row['name_labour']}</td><td>";
                        echo "<form action='' method='post'>";
                        echo "<input type='hidden' name='remove_labour' value='{$row['id_labour']}'>";
                        echo "<button type='submit' class='btn btn-danger'>Retirer</button>";
                        echo "</form>";
                        echo "</td></tr>";
                    }
                    echo "</table>";
                }
                ?>
                <!-- Add form for Labour Equipments -->
                <form action="" method="post">
                    <input type="text" name="labour_equipment" placeholder="New Equipment Name" id="labour" style="width: 250px;">
                    <input type="submit" class="btn btn-success" value="Ajouter de l'équipement de main-d'œuvre" name="add_labour" onclick="veriflabour()">
                </form>
            </div>

            <div class="card">
                <h1 class="text-center">OPD Equipments</h1>
                <?php
                // Query to fetch equipment from opd table
                $req3 = "SELECT * FROM opd ORDER BY id_opd ASC";
                $res3 = mysqli_query($connect, $req3);

                // Display equipment from opd table
                if (mysqli_num_rows($res3) > 0) {
                    echo "<table class='table table-bordered'>";
                    echo "<thead><th>ID</th><th>Nom de l'équipement</th><th>Action</th></thead>";
                    while ($row = mysqli_fetch_array($res3)) {
                        echo "<tr><td>{$row['id_opd']}</td><td>{$row['name_opd']}</td><td>";
                        echo "<form action='' method='post'>";
                        echo "<input type='hidden' name='remove_opd' value='{$row['id_opd']}'>";
                        echo "<button type='submit' class='btn btn-danger'>Retirer</button>";
                        echo "</form>";
                        echo "</td></tr>";
                    }
                    echo "</table>";
                }
                ?>
                <!-- Add form for OPD Equipments -->
                <form action="" method="post">
                    <input type="text" name="opd_equipment" placeholder="New Equipment Name" id="opd" style="width: 250px;">
                    <input type="submit" class="btn btn-success" value="Ajouter un équipement OPD" name="add_opd" onclick="verifopd()">
                </form>
            </div>
        </div>
    </main>
</body>

</html>
