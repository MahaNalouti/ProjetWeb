<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
 
 <title>profilesite</title>
 <link rel="stylesheet" href="style.css">
 <script src="script.js"></script>
   
</head>
<body>
<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i>Hopital Medical</a>
		<ul class="side-menu">
			<li><a href="profile.php" class="active"><i class='bx bxs-dashboard icon' ></i>Tableau de bord </a></li>
			<li><a href="profile_patient.php"><i class="bx bx-table icon"></i>Profile</a></li>
			<li><a href="rendezvous.php"><i class="bx bx-table icon"></i>Rendez_vous</a></li>
            
			
			
		<ul class="side-menu">
			<li><a href="logout_1.php"><i class="bx bx-table icon"></i>Deconnexion</a></li>
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
</body>
</html>