<?php
session_start();
$_SESSION['admin'] = 'username';

// Function to update room state
function updateRoomState($id, $state) {
    global $connect;
    $req = "UPDATE rooms SET etat = $state WHERE id_room = $id";
    $res = mysqli_query($connect, $req);
    return $res;
}

// Function to add a new room
function addRoom($state) {
    global $connect;
    $req = "INSERT INTO rooms (etat) VALUES ($state)";
    $res = mysqli_query($connect, $req);
    return $res;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Stock</title>

   

</head>

<body>
    <?php
    include("side_navbar.php");
    
    ?>
    <main>
    <div class="data">
    <div class="content-data">

    
            
               
                            <div >
                            <?php
                               include("connection.php");
                             ?>
                             <div class="head"></div>
                             <div class="menu">
                             <h1 class="text-center">Toutes les salles</h1>
                    <?php
                    // Query to fetch rooms from the rooms table
                    $req = "SELECT * FROM rooms";
                    $res = mysqli_query($connect, $req);

                    // Check if add room form is submitted
                    if(isset($_POST['add_room'])) {
                        $state = $_POST['room_state'];
                        $added = addRoom($state);
                        if($added) {
                            echo "<div class='alert alert-success' role='alert'>Salle ajoutée avec succès</div>";
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>Échec de l'ajout de salle</div>";
                        }
                    }

                    // Display rooms in a table
                    if (mysqli_num_rows($res) > 0) {
                        echo "<table class='table table-bordered'>";
                        echo "<thead><th>ID</th><th>Room State</th><th>Action</th></thead>";
                        while ($row = mysqli_fetch_array($res)) {
                            echo "<tr><td>{$row['id_room']}</td><td>";
                            echo $row['etat'] == 1 ? 'Occupied' : 'Free';
                            echo "</td><td>";
                            // Buttons to free and occupy the room
                            if ($row['etat'] == 1) {
                                echo "<form action='' method='post'>";
                                echo "<input type='hidden' name='room_id' value='{$row['id_room']}'>";
                                echo "<button type='submit' class='btn btn-danger' name='free_room'>Chambre libre</button>";
                                echo "</form>";
                            } else {
                                echo "<form action='' method='post'>";
                                echo "<input type='hidden' name='room_id' value='{$row['id_room']}'>";
                                echo "<button type='submit' class='btn btn-success' name='occupy_room'>Occuper la salle</button>";
                                echo "</form>";
                            }
                            echo "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<h5 class='text-center'>Aucune chambre trouvée</h5>";
                    }
                    ?>

                    <?php
                    // Check if free room button is clicked
                    if(isset($_POST['free_room'])) {
                        $room_id = $_POST['room_id'];
                        $updated = updateRoomState($room_id, 0);
                        if($updated) {
                            echo "<div class='alert alert-success' role='alert'>Chambre libérée avec succès</div>";
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>Échec de la libération de la salle</div>";
                        }
                    }

                    // Check if occupy room button is clicked
                    if(isset($_POST['occupy_room'])) {
                        $room_id = $_POST['room_id'];
                        $updated = updateRoomState($room_id, 1);
                        if($updated) {
                            echo "<div class='alert alert-success' role='alert'>Chambre occupée avec succès</div>";
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>Impossible d'occuper la chambre</div>";
                        }
                    }

                    
                    ?>
                            
       
                              
                            </div>
                            </div>
     </div>


                    <div class="content-data">

                        <div >
                        <h1 class="text-center mt-4">   Ajouter une nouvelle salle</h1>
                        <form action="" method="post" class="mt-3">
                <div class="form-group">
                    <label for="room_state">État de la salle:</label>
                    <select name="room_state" id="room_state" class="form-control">
                        <option value="0">Libre</option>
                        <option value="1">Occupée</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="add_room"> Ajouter une nouvelle salle</button>
            </form>
                              
                              
                            </div>
                        </div>

                   


                            
                        
           
   
    </div>
 </main>
</body>

</html>
