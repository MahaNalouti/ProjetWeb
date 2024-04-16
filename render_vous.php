<?php
session_start();
$_SESSION['admin'] = 'username';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Rendez_Vous</title>
    <script>
   
   function validateForm() 
{    
    var cnss = document.getElementsByName("cnss")[0].value;
    var nom = document.getElementsByName("nom")[0].value;
    var prenom = document.getElementsByName("prenom")[0].value;
    var dat = document.getElementById("date").value;
    var sp = document.getElementsByName("sp")[0].value;
    //var regex = /^\d{4}\/\d{2}\/\d{2}$/;  

    if (cnss.trim() == "" || cnss.length>11) {
      alert("Veuillez saisir votre num_cnss.");
      
    }

    if (nom.trim() == "" || nom.length>30) {
      alert("Veuillez saisir le nom du patient.");
      
    }

    if (prenom.trim() == "" || prenom.length>30) {
      alert("Veuillez saisir le prenom du patient.");
      
    }

    if (sp.trim() == "" || sp.length>30) {
      alert("Veuillez saisir la spécialité.");
      
    }

    if (dat.trim() == "") {
      alert("Veuillez saisir le date."); //RASLENNN
      
    }


   

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

    
            
               
                            <div >
                            <?php
                               include("connection.php");
                             
   $pat = $_SESSION['patient'];
   $sel = mysqli_query($connect, "SELECT * FROM rendez_vous "); //WHERE id = '$pat'";
   $row = mysqli_fetch_array($sel);

   $mat_cnss = $row['mat_cnss']; 
   $nom = $row['nom']; 
   $prenom = $row['prenom'];
   $date = $row['date'];
   $specialite = $row['specialite'];
   
   
   

   if (isset($_POST['book'])) 
   {
       $cnss = $_POST['cnss'];
       $nom = $_POST['nom'];
       $prenom = $_POST['prenom'];
       $date = $_POST['date'];
       $sp = $_POST['sp'];
       $error = array();

    if (empty($cnss))
    {
       $error['u'] = "Enter le num_cnss";
    }
    elseif (empty($nom))
    {
       $error['u'] = "Enter le nom de patient";
    }

    elseif (empty($prenom))
    {
       $error['u'] = "Enter le prenom de patient";
    }
   else if (empty($date))
   {
       $error['u'] = "Enter le date"; 
   }
   else if (empty($sp))
   {
       $error['u'] = "entrez la spécialité";
   }

      /* if(empty($cnss) || empty($nom) || empty($prenom) || empty($date) || empty($sp))
       {
          <script> alert"errrrrrrrrrrrrrrror";  <\script>
       }*/
       if (count($error) ==0)
       {
           $query ="INSERT INTO rendez_vous(mat_cnss,nom,prenom,date,specialite) 
           VALUES('$cnss','$nom','$prenom','$date','$sp')";
           $res = mysqli_query($connect,$query);
           if($res)
           {
               echo"<script>alert('rendez_vous enregistré')</script>";
           }
       }
       else{
          
          echo"<script>alert('verifier vos coordonnées')</script>";
          
          }


   }
   if (isset($error['u']))
 {
   $er = $error['u'];
   $show = "<h5 class='text-center alert alert-danger'>$er
            </h5>";
   
 }
 else
 {
   $show = "hibaaaaaaaaaaaaa";

 }
   

?>
                           
                            
                             <h1 class="text-center my-2">rendez-vous</h1>

                             <form method="post" onsubmit= " validateForm()">
                             <div>
                                <label>Mat_cnss</label>
                                 <input type="number" name="cnss" class="form-control" >
                             </div>
                                 
                                <div>
                                <label>Nom </label>
                                 <input type="text" name="nom" class="form-control" >
                                </div> 

                                <div>
                                <label>Prenom</label>
                                 <input type="text" name="prenom" class="form-control" >

                                </div>
                                 
                                 <div>
                                 <label>Appointment Date</label>
                                 <input type="date" name="date"  id="date" class="form-control" >
                                 </div>

                                 <div>
                                 <label>Specialité</label>
                                    <select name="sp" id="Spec" class="form-select" aria-label="Default select example" >
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



                                 </div>

                                 <div>
                                  <input type="submit" name="book" class="btn btn-info my-2" value="rendez-vous" onclick= " validateForm()">
                                 </div>

                                

                                
                               </form>  
                                
                                
                                    
                                
                            </div>
     </div>


                    


                            
                        
           
   
    </div>
 </main>
</body>

</html>
