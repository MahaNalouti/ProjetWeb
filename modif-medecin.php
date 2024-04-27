<?php
session_start();
include("connectionm.php");
/*
	$nom='';
	if(isset($_SESSION['admin'])){
		$admin=$_SESSION['admin'];
		$query="SELECT * FROM admin where unom='$admin'";
		$query_run=mysqli_query($con,$query);
		$row=mysqli_fetch_array($query_run);
		$unom=$row['unom'];
		$mdp=$row['mdp'];
		$nom=$row['nom'];
	}
	*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="input.css">
	<title>Modifier Medecin</title>
</head>
<body>
	
<?php
  if(isset($_POST['ModifM'])){
        $idM=htmlspecialchars(trim($_POST['IdM']));
        $Nom=htmlspecialchars(trim($_POST['Nom']));
        $Prenom=htmlspecialchars(trim($_POST['Prenom']));
        $Unom=htmlspecialchars(trim($_POST['Unom']));
        $email=htmlspecialchars(trim($_POST['email']));
        $sexe=htmlspecialchars(trim($_POST['sexe']));
        $Tel=htmlspecialchars(trim($_POST['Tel']));
        $Mdp=htmlspecialchars(trim($_POST['Mdp']));
        $Cmdps=htmlspecialchars(trim($_POST['Cmdps']));
        $Sal=htmlspecialchars(trim($_POST['Sal']));
        $Spec=htmlspecialchars(trim($_POST['Spec']));

        try {
            if (!empty($idM) || !empty($Nom) || !empty($Prenom) || !empty($Unom) || !empty($email) || !empty($sexe) || !empty($Tel) || !empty($Mdp) || 
                !empty($Cmdp) || !empty($Sal) || !empty($Spec)) {
        
                // Check if the specialty already exists for another doctor
                $check_query = "SELECT COUNT(*) AS count FROM doctor WHERE specialite = :specialite AND id != :id";
                $check_stmt = $connect->prepare($check_query);
                $check_stmt->bindParam(':specialite', $Spec);
                $check_stmt->bindParam(':id', $idM);
                $check_stmt->execute();
                $result = $check_stmt->fetch(PDO::FETCH_ASSOC);
        
                if ($result['count'] > 0) {
                   // echo"<script>alert('La spécialité existe déjà pour un autre médecin');</script>";
                    $_SESSION['message'] = 'La spécialité existe déjà pour un autre médecin';
                    header("Location: doctor.php");
                    exit();
                } else {
                    $query = "UPDATE doctor SET nom=:nom, prenom=:prenom, unom=:unom,
                              email=:email, sexe=:sexe, tel=:tel, mdp=:mdp, salaire=:salaire, specialite=:specialite
                              WHERE id=:id";
                    $stmt = $connect->prepare($query);
                    $stmt->bindParam(':nom', $Nom);
                    $stmt->bindParam(':prenom', $Prenom);
                    $stmt->bindParam(':unom', $Unom);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':sexe', $sexe);
                    $stmt->bindParam(':tel', $Tel);
                    $stmt->bindParam(':mdp', $Mdp);
                    $stmt->bindParam(':salaire', $Sal);
                    $stmt->bindParam(':specialite', $Spec);
                    $stmt->bindParam(':id', $idM);
        
                    $stmt->execute();
        
                    $_SESSION['message'] = "Médecin modifié";
                    header("Location: doctor.php");
                    exit();
                }
            } else {
                $_SESSION['message'] = "Veuillez remplir tous les champs";
                header("Location: doctor.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['message'] = "Erreur lors de la modification du médecin " . $e->getMessage();
            header("Location: doctor.php");
            exit();
        }
        
    }


	?>
	<?php
	include("side_navbar.php");
	?>
	

		<!-- MAIN -->
		<main>
			<h1 class="title">Modifier Medecin</h1>
			<ul class="breadcrumbs">
				<li><a href="list-medecin.php">Listes Medecins</a></li>
				<li class="divider">/</li>
				<li><a href="modif-medecin.php" class="active">Modifier Medecin</a></li>
			</ul>
			<div class="data">
                <div>
                <?php
                    include("message.php");
                ?>
                </div>
				<div class="content-data">
					<div class="head">
						<h3>Formulaire</h3>
						<a href="doctor.php" class="btn-green">Retourner</a>
					</div>
						<div>
                        <?php 
                    if(isset($_POST['id_modif'])){
                      $id = $_POST['id_modif'];
                                $query = "SELECT * FROM doctor WHERE id=:id";
                                $stmt = $connect->prepare($query);
                                $stmt->bindParam(':id', $id);
                                $stmt->execute();
			    	$medecin = $stmt->fetch(PDO::FETCH_ASSOC);
                            ?>
            <form action="" method="post" id="form">
                                <input type="hidden" name="IdM" value="<?php echo $medecin['id']?>">
                                <div class="form-group input-control">
                                    <label for="">Nom</label>
                                    <input type="text" name="Nom" id="Nom" class="form-control" 
                                    autocomplete="off" placeholder="Entrer nom" value="<?php echo $medecin['nom']?>" required >
                                    <div class="error"></div>
                            </div>
                            <div class="form-group input-control">
                                <label for="" >Prenom</label>
                                <input type="text" name="Prenom" id="Prenom" class="form-control" 
                                autocomplete="off" value="<?php echo $medecin['prenom']?>" required >
                                <div class="error"></div>

                                </div>
                            <div class="form-group input-control">
                                <label for="" >Nom Utilisateur</label>
                                <input type="text" name="Unom" id="Unom" class="form-control" 
                                autocomplete="off" value="<?php echo $medecin['unom']?>" required >
                                <div class="error"></div>
                            </div>
                            <div class="form-group input-control">
                                <label for="">Email</label>
                                <input type="text" name="email" id="email" class="form-control" 
                                autocomplete="off" value="<?php echo $medecin['email']?>" required >
                                <div class="error"></div>
                            </div>
                            <div class="form-group input-control">
							<label for="">Sexe</label>
							<select name="sexe" id="sexe" class="form-select" aria-label="Default select example" required >
								<option value=""></option>
								<option value="Femme" <?php echo ($medecin['sexe'] == 'Femme') ? 'selected' : ''; ?>>Femme</option>
								<option value="Homme" <?php echo ($medecin['sexe'] == 'Homme') ? 'selected' : ''; ?> >Homme</option>
							</select>
							<div class="error"></div>
							</div>
                            <div class="form-group input-control">
                                    <label for="">Télephone</label>
                                    <input type="number" name="Tel" id="Tel" class="form-control" 
                                    autocomplete="off" value='<?php echo $medecin['tel']?>' required >
                                    <div class="error"></div>
                            </div>
                                
                            <div class="form-group input-control">
                                    <label for="">Mot de passe</label>
                                    <input type="password" name="Mdp" id="Mdp" class="form-control" 
                                    autocomplete="off" value="<?php echo $medecin['mdp']?>" required >
                                    <div class="error"></div>
                            </div>
                            
                            <div class="form-group input-control">
                                    <label for="">Confirmer mot de passe</label>
                                    <input type="password" name="Cmdp" id="Cmdp" class="form-control" 
                                    autocomplete="off" value='<?php echo $medecin['mdp']?>' required >
                                    <div class="error"></div>
                            </div>
                            
                            <div class="form-group input-control">
                                    <label for="">Salaire</label>
                                    <input type="text" name="Sal" id="Sal" class="form-control" 
                                    autocomplete="off" value='<?php echo $medecin['salaire']?>' required >
                                    <div class="error"></div>
                            </div>
                            
                            <div class="form-group input-control">
                            <label for="">Specialité</label>
                                <select name="Spec" id="Spec" class="form-select" aria-label="Default select example" required >
                                <option value=""></option>
                                <option value="pédiatrie" <?php echo ($medecin['specialite'] == 'pédiatrie') ? 'selected' : ''; ?>>Pédiatrie</option>
                            <option value="dentisterie" <?php echo ($medecin['specialite'] == 'dentisterie') ? 'selected' : ''; ?>>Dentisterie</option>
                            <option value="psychiatrie" <?php echo ($medecin['specialite'] == 'psychiatrie') ? 'selected' : ''; ?>>Psychiatrie</option>
                            <option value="anesthésiologie" <?php echo ($medecin['specialite'] == 'anesthésiologie') ? 'selected' : ''; ?>>Anesthésiologie</option>
                            <option value="ophtalmologie" <?php echo ($medecin['specialite'] == 'ophtalmologie') ? 'selected' : ''; ?>>Ophtalmologie</option>
                            <option value="neurologie" <?php echo ($medecin['specialite'] == 'neurologie') ? 'selected' : ''; ?>>Neurologie</option>
                            <option value="cardiologie" <?php echo ($medecin['specialite'] == 'cardiologie') ? 'selected' : ''; ?>>Cardiologie</option>
                            <option value="néphrologie" <?php echo ($medecin['specialite'] == 'néphrologie') ? 'selected' : ''; ?>>Néphrologie</option>
                                </select>
                                <div class="error"></div>
                
                            </div>
                            
                                </div>
                                            
                                                <button type="reset" class="btn-second" data-bs-dismiss="modal">Annuler</button>
                                                <button type="submit" name="ModifM" class="btn-send">Modifier </button>
            </form>
                <?php
                           
                        }else{
                            echo "<h4>Medecin non trouvé</h4>";
                        }
                    
                           
                        
                    ?>
						</div>
					</div>
					
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="script.js"></script>
	<script>
		  const form=document.getElementById('form');
const nom=document.getElementById('Nom');
const prenom=document.getElementById('Prenom');
const unom=document.getElementById('Unom');
const email=document.getElementById('email');
const tel=document.getElementById('Tel');
const mdp=document.getElementById('Mdp');
const Cmdp=document.getElementById('Cmdp');
const spec = document.getElementById('Spec');
const sexe=document.getElementById('sexe');
const sal=document.getElementById('Sal');

form.addEventListener('submit',e =>{
    if (!validateInputs()) {
        e.preventDefault(); 
    }
});
const setError=(element,message)=>{
    const inputControl=element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText=message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
}
const setSuccess=(element)=>{
    const inputControl=element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText='';
    inputControl.classList.remove('error');
    inputControl.classList.add('success');
    

}
const isValidEmail=(email)=>{
    const re=/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
    return re.test(String(email).toLowerCase());

}
const validatePhoneNumber = (phoneNumber) => {
    const re = /^[0-9]{8}$/;
    return re.test(phoneNumber);
}
const validateSalaire = (sal) => {
    const re = /^\d+(\.\d{1,2})?dt$/;       ///^\d{3,}(\.\d{1,2})?$/
    return re.test(sal);
}
const validateText=(text)=>{
    const re=/^[A-Za-z]+$/;
    return re.test(text);
}
;


const validateInputs =()=>{
    const nomValue=nom.value.trim();
    const prenomValue=prenom.value.trim();
    const unomValue=unom.value.trim();
    const emailValue=email.value.trim();
    const mdpValue=mdp.value.trim();
    const CmdpValue=Cmdp.value.trim();
    const specValue = spec.value.trim();
    const sexeValue = sexe.value.trim();
    const telValue= tel.value.trim();
    const salValue=sal.value.trim();

    if(nomValue==''){
        setError(nom,'Le champ nom est obligatoire');
        return false;
    }else if(!validateText(nomValue)){
        setError(nom,'Le champ nom doit etre des caracteres seulement');
        return false;
    }else{
        setSuccess(nom);
    }

    if(prenomValue==''){
        setError(prenom,'Le champ prénom est obligatoire.');
        return false;
    }
	else if(!validateText(prenomValue)){
        setError(prenom,'Le champ prenom doit etre des caracteres seulement');
        return false;
    }else{
        setSuccess(prenom);
    }
    if(unomValue==''){
        setError(unom,'Le champ nom utilisateur est obligatoire');
        return false;
    }else{
        setSuccess(unom);
    }

    if(emailValue==''){
        setError(email,'Veuillez saisir une adresse e-mail');
        return false;
    }else if(!isValidEmail(emailValue)){
        setError(email,'Veuillez saisir une adresse e-mail valide');
        return false;
    }else{
        setSuccess(email);
    }
    
    if(sexeValue==''){
        setError(sexe,'Veuillez selectionner le sexe');
        return false;
    }else{
        setSuccess(sexe);
    }
    if (telValue === '') {
        setError(tel, 'Veuillez saisir votre numéro de téléphone');
        return false;
    } else if (!validatePhoneNumber(telValue)) {
        setError(tel, 'Veuillez saisir un numéro de téléphone valide');
        return false;
    } else {
        setSuccess(tel);
    }

    if(mdpValue==''){
        setError(mdp,'Veuillez saisir votre mot de passe');
        return false;
    }else if(mdpValue.length<4){
        setError(mdp,'Mot de passe doit avoir au minimun 4 caracteres');
        return false;
    }else{
        setSuccess(mdp);
    }

    if(CmdpValue==''){
        setError(Cmdp,'Veuillez confirmer votre mot de passe');
        return false;
    }else if(CmdpValue!=mdpValue){
        setError(Cmdp,'Les mots de passe ne correspondent pas');
        return false;
    }else{
        setSuccess(Cmdp);
    }
    if (salValue == '') {
        setError(sal, 'Veuillez saisir le salaire');
        return false;
    }else if(!validateSalaire(salValue)){
        setError(sal,'Veuillez saisir un salaire valide (au moins trois chiffres avant la virgule)');
        return false;
    } 
    else {
        setSuccess(sal);
    }
    if (specValue == '') {
        setError(spec, 'Veuillez sélectionner une spécialité.');
        return false;
    }
    else {
        setSuccess(spec);
    }
   

   return true;
};
	</script>
</body>
</html>
