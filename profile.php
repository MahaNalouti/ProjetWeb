<?php
session_start();
$uname = $_SESSION['Patient'] ?? ""; // Assign the value of $_SESSION['Patient'] to $uname, or an empty string if it's not set
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="style.css">
	<title>patientSite</title>
</head>
<body>
	
	<!-- SIDEBAR -->
    <section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i>Hopital Medicale</a>
		<ul class="side-menu">
			<li><a href="profile.php" class="active"><i class='bx bxs-dashboard icon' ></i>Tableau de bord </a></li>
			<li><a href="profile_patient.php"><i class="bx bx-table icon"></i>Profile</a></li>
			<li><a href="rendezvous.php"><i class="bx bx-table icon"></i>Rendez_vous</a></li>
            
			
			
		<ul class="side-menu">
			<li><a href="logout (1).php"><i class="bx bx-table icon"></i>Deconnexion</a></li>
		</ul>
		
	</section>
	<section id="content">
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<form action="#">
				<div class="form-group">
					<input type="text" placeholder="Search...">
					<i class='bx bx-search icon' ></i>
				</div>
			</form>
			<a href="#" class="nav-link">
				<i class='bx bxs-bell icon' ></i>
				<span class="badge">5</span>
			</a>
			<a href="#" class="nav-link">
				<i class='bx bxs-message-square-dots icon' ></i>
				<span class="badge">8</span>
			</a>
			<span class="divider"></span>
			<div class="profile">
				<img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
				
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
        <h2 class="my-2" style="color: #0C5FCD;;">Bonjour <?php echo $uname; ?> </h2>
        <br>
			<h1 class="title">Dashboard</h1>
           
			<ul class="breadcrumbs">
				<li><a href="#">Page d'accueil</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Tableau de bord</a></li>
			</ul>
			<div class="info-data">
				<div class="card">
					<div class="head">
                    <div>
                  <a href="profile_patient.php" style="font-size: 30px;">Profile</a>
                   </div>
                   <i class='bx bxs-user-detail' style='font-size: 50px; color: #0C5FCD;'></i>

					</div>
				</div>
				
				<div class="card">
					<div class="head">
						<div>
							
							<a href="rendezvous.php"style="font-size: 30px;">Rendez_vous</a>
						</div>
						<i class='bx bxs-calendar'style='font-size: 50px; color: #0C5FCD;'></i>
					</div>
				</div>
				
			</div>
			<div class="data">
				<div class="content-data">
					<div class="head">
						<h3>other part</h3>
						
					</div>
					
				</div>
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="script.js"></script>
</body>
</html>

    <h2 class="my-2">Bonjour <?php echo $uname; ?> </h2>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hK"></script>
<!--Sweet alert js-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        swal({
            title: "Bienvenue cher <?php echo $uname; ?> !",
            text: "Bonne journée!",
            imageUrl: "Health professional team (1).gif",
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: "Custom image",
            animation: false
        });
    });
</script>

</body>
</html>
