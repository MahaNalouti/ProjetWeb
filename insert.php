<?php
session_start();
include("connection.php");

if(isset($_POST['btn_supp'])){
    $matriculeS = mysqli_real_escape_string($connect, $_POST['btn_supp']);

    $query2 = "DELETE FROM patient WHERE matricule='$matriculeS'";
    $query_run = mysqli_query($connect, $query2);

    if($query_run){
        $_SESSION['message'] = "Patient supprimé";
    }else{
        $_SESSION['message'] = "Erreur lors de la suppression du patient: " . mysqli_error($con);
    }
    header("Location:listpatient.php");
    exit(0);
}

if(isset($_POST['submit_modification'])){
    $matricule_modif = mysqli_real_escape_string($connect, $_POST['matricule_modif']); 
    $fname = mysqli_real_escape_string($connect, $_POST['fname']);
    $sname = mysqli_real_escape_string($connect, $_POST['sname']);
    $uname = mysqli_real_escape_string($connect, $_POST['uname']);
    $date = mysqli_real_escape_string($connect, $_POST['date']);
    $age = mysqli_real_escape_string($connect, $_POST['age']);
    $allergie = mysqli_real_escape_string($connect, $_POST['allergie']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $poids = mysqli_real_escape_string($connect, $_POST['poids']);
    $sexe = mysqli_real_escape_string($connect, $_POST['sexe']);
    $sang = mysqli_real_escape_string($connect, $_POST['sang']);
    $derr = mysqli_real_escape_string($connect, $_POST['derr']);
    $tel = mysqli_real_escape_string($connect, $_POST['tel']);
    $query = "UPDATE patient SET nom_p='$fname', prenom_p='$sname', username_p='$uname', pass_p='$password', naiss='$date', age='$age', sexe='$sexe', grp_sang='$sang',
 poids='$poids', allergie='$allergie', tel='$tel', `der_rdv_p`='$derr' 
 WHERE matricule='$matricule_modif'";

    $query_run = mysqli_query($connect, $query);
    if($query_run){
        $_SESSION['message'] = "Patient modifié";
    }else{
        $_SESSION['message'] = "Erreur lors de la modification du patient: " . mysqli_error($connect);
    }
    header("Location:listpatient.php");
    exit(0);
}

if(isset($_POST['ajoutM'])){
    $AjmatriculeM = mysqli_real_escape_string($connect, $_POST['matricule']); 
    $Ajfname = mysqli_real_escape_string($connect, $_POST['fname']);
    $Ajsname = mysqli_real_escape_string($connect, $_POST['sname']);
    $Ajuname = mysqli_real_escape_string($connect, $_POST['uname']);
    $Ajdate = mysqli_real_escape_string($connect, $_POST['date']);
    $Ajage = mysqli_real_escape_string($connect, $_POST['age']);
    $Ajallergie = mysqli_real_escape_string($connect, $_POST['allergie']);
    $Ajpassword = mysqli_real_escape_string($connect, $_POST['password']);
    $Ajpoids = mysqli_real_escape_string($connect, $_POST['poids']);
    $Ajsexe = mysqli_real_escape_string($connect, $_POST['sexe']);
    $Ajsang = mysqli_real_escape_string($connect, $_POST['sang']);
    $Ajderr = mysqli_real_escape_string($connect, $_POST['derr']);
    $Ajtel = mysqli_real_escape_string($connect, $_POST['tel']);
    $query1 = "INSERT INTO patient(nom_p, prenom_p, matricule, username_p, pass_p, naiss, age,
     sexe, grp_sang, poids, allergie,tel, der_rdv_p) 
      VALUES('$Ajfname','$Ajsname', 
      '$AjmatriculeM', '$Ajuname', '$Ajpassword', '$Ajdate', '$Ajage', '$Ajsexe', '$Ajsang', '$Ajpoids', '$Ajallergie','$Ajtel','$Ajderr')";
    $query_run = mysqli_query($connect, $query1);
    if($query_run){
        $_SESSION['message'] = "Patient ajouté";
    }else{
        $_SESSION['message'] = "Erreur lors de l'ajout du patient: " . mysqli_error($connect);
    }
    header("Location:listpatient.php");
    exit(0);
}
?>