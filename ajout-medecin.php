<?php
session_start();
include("../include/connection.php");

if(isset($_POST['ajoutM'])){

    $nom = htmlspecialchars(trim($_POST['Nom']));
   $prenom = htmlspecialchars(trim($_POST['Prenom']));
   $unom = htmlspecialchars(trim($_POST['Unom']));
   $email = htmlspecialchars(trim($_POST['email']));
   $sexe = htmlspecialchars(trim($_POST['sexe']));
   $tel = htmlspecialchars(trim($_POST['Tel']));
   $mdp = htmlspecialchars(trim($_POST['Mdp']));
   $Cmdp = htmlspecialchars(trim($_POST['Cmdp']));
   $sal = htmlspecialchars(trim($_POST['Sal']));
   $spec = htmlspecialchars(trim($_POST['Spec']));

   if(!empty($nom) && !empty($prenom) && !empty($unom) && !empty($email) && !empty($sexe) && !empty($tel) && !empty($mdp) && 
   !empty($Cmdp) && !empty($sal) && !empty($spec) ){
       
       $sql="SELECT * FROM doctors WHERE unom = '$unom'";
       $result = $con->query($sql);
       $query="SELECT * FROM doctors where specialite='$spec'";
       $query_run=$con->query($query);
       if ($result->num_rows > 0){
               $_SESSION['message']="Nom utilisateur déja pris";
       }else if($query_run->num_rows>0){
            $_SESSION['message']="Cette specialité est déja prise";
       }else{
            $hashed_mdp=password_hash($mdp,PASSWORD_DEFAULT);
           $query = "INSERT INTO doctors (nom,prenom,unom,email,tel,sexe,mdp,salaire,specialite) 
           VALUES ('$nom','$prenom','$unom','$email','$tel','$sexe','$hashed_mdp','$sal','$spec')";
           $query_run =$con->query($query);
           if($query_run ){
               $_SESSION['message']="Medecin ajouté";
           } else {
               $_SESSION['message']="Medecin non ajouté";
               header("Location:ajout-medecin.php");
           }
       }
   }
   else{
     
    $_SESSION['message']="Veuilez remplir tous les champs";
   }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="input.css">

	<title>Listes Medecins</title>
</head>
<body>
	
<!-- NAVBAR -->
<?php	/*
	include("side_navbar.php");*/
	?>

	<!-- NAVBAR -->
	<section id="content">

		<!-- MAIN -->
		<main>
			<h1 class="title">Ajouter Medecin</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Ajouter Medecin</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Medecin</a></li>
			</ul>
            <div>
                <?php
                    include("message.php");
                ?>
            </div>
			<div class="data">
                
                
				<div class="content-data">
					<div class="head">
						<h3>Formulaire</h3>
						<a href="list-medecin.php" class="btn-green float-end">Retourner</a>
					</div>
						<div>
                            <form action="" method="post" id="form">
                    
                                <div class="form-group input-control">
                                        <label for="">Nom</label>
                                        <input type="text" name="Nom" id="Nom" class="form-control" 
                                        autocomplete="off" required >
                                        <div class="error"></div>
                                </div>
                                <div class="form-group input-control">
                                    <label for="" >Prenom</label>
                                    <input type="text" name="Prenom" id="Prenom" class="form-control" 
                                    autocomplete="off" required>
                                    <div class="error"></div>
                                    </div>
                                <div class="form-group input-control">
                                    <label for="" >Nom Utilisateur</label>
                                    <input type="text" name="Unom" id="Unom" class="form-control" 
                                    autocomplete="off" required>
                                    <div class="error"></div>
                                </div>
                                <div class="form-group input-control">
                                    <label for="">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" 
                                    autocomplete="off" required>
                                    <div class="error"></div>
                                </div>
                                <div class="form-group input-control">
                                    <label for="">Sexe</label>
                                    <select name="sexe" id="sexe" class="form-select" aria-label="Default select example">
                                        <option value="">Selectionner le sexe</option>
                                        <option value="Femme">Femme</option>
                                        <option value="Homme">Homme</option>
                                    </select>
                                    <div class="error"></div>
                                </div>
                                <div class="form-group input-control">
                                        <label for="">Télephone</label>
                                        <input type="number" name="Tel" id="Tel" class="form-control" 
                                        autocomplete="off" required>
                                        <div class="error"></div>
                                </div>
                                    
                                <div class="form-group input-control">
                                        <label for="">Mot de passe</label>
                                        <input type="password" name="Mdp" id="Mdp" class="form-control" 
                                        autocomplete="off" required>
                                        <div class="error"></div>
                                </div>
                                <div class="form-group input-control">
                                        <label for="">Confirmer mot de passe</label>
                                        <input type="password" name="Cmdp" id="Cmdp" class="form-control" 
                                        autocomplete="off" required>
                                        <div class="error"></div>
                                </div>
                
                                <div class="form-group input-control">
                                        <label for="">Salaire</label>
                                        <input type="text" name="Sal" id="Sal" class="form-control" 
                                        autocomplete="off" required>
                                        <div class="error"></div>
                                </div>
                                
                                <div class="form-group input-control">
                                <label for="">Specialité</label>
                                    <select name="Spec" id="Spec" class="form-select" aria-label="Default select example" >
                                    <option value="">Selectionner la specialité</option>
                                    <option value="pédiatrie">Pédiatrie</option>
                                    <option value="dentisterie">Dentisterie</option>
                                    <option value="psychiatrie">Psychiatrie</option>
                                    <option value="anesthésiologie">Anesthésiologie</option>
                                    <option value="ophtalmologie">Ophtalmologie</option>
                                    <option value="neurologie">Neurologie</option>
                                    <option value="cardiologie">Cardiologie</option>
                                    <option value="néphrologie">Néphrologie</option>
                                    </select>
                                    <div class="error"></div>
                                </div>
                
                                </div>
                                <div >
                                        <button type="reset" class="btn-second" >Annuler</button>
                                        <button type="submit" name="ajoutM" class="btn-send" >Ajouter </button>
                                </div>
                            </form>
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
    <script >
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
    const re = /^\d{3,}(\.\d{1,2})?$/;
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