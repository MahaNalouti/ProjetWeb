<html>
<head>
	<title>HMS</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
<link rel="stylesheet" type="text/css" href="login.css">
<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<style >
     .form-control {
    border-radius: 0.75rem;
}
        .register-left img {
            width: 400px;
            height: auto; 
        }
        .register-left h3{
          font-size: 3.5rem;
          color: beige;
        }
        
</style>

<script>


/*
function checklen()
{
    var pass1 = document.getElementById("password");  
    if(pass1.value.length<6){  
        alert("Password must be at least 6 characters long. Try again!");  
        return false;  
  }  
}
*/
</script>

</head>


<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" >
    <div class="container">

      <a class="navbar-brand js-scroll-trigger" href="#" style="margin-top: 10px;margin-left:-65px;font-family: 'IBM Plex Sans', sans-serif;"><h4><i class="fa fa-hospital-o" aria-hidden="true"></i><i class="fas fa-heartbeat"></i> Hopitale </h4></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" style="margin-right: 40px;">
            <a class="nav-link js-scroll-trigger" href="../acceuil.php" style="color: white;font-family: 'IBM Plex Sans', sans-serif;"><h6>Acceuil</h6></a>
          </li>


          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="contact.html" style="color: white;font-family: 'IBM Plex Sans', sans-serif;"><h6>CONTACT</h6></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

	

<div class="container register" style="font-family: 'IBM Plex Sans', sans-serif;">
                <div class="row">
                    <div class="col-md-3 register-left" style="margin-top: 3%;right: 10%">
                        <img src="Doctors-rafiki.svg" alt=""/>
                        <h3>Welcome</h3>
                       
                    </div>
                    <div class="col-md-9 register-right" style="margin-top: 40px;left: 80px;">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist" style="width: 40% ;">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Patient</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Doctor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Admin</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Login as Patient</h3>
                          
                                <form method="post" action="func2.php">
                                <div class="row register-form">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="Username " name="fname"  required/>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password " id="password" name="password"  required/>
                                        </div>
                                        
                                        <input type="submit" class="btnRegister" name="patsub1" onclick="return checklen();" value="login"/>
                                    </div>

                                </div>
                            </form>
                            </div>

                            <!--partieee mahaaaa-->
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading">Login as Doctor</h3>
                                <form method="post" action="func1.php">
                                <div class="row register-form">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="Username " name="fname"  required/>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password " id="password" name="password"  required/>
                                        </div>
                                        
                                        <input type="submit" class="btnRegister" name="patsub1" onclick="return checklen();" value="login"/>
                                    </div>

                                </div>
                            </form>
                            </div>

                               <!--partieee Hibaaa-->
                            <div class="tab-pane fade show" id="admin" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading">Login as Admin</h3> 
                                <form method="post" action="func3.php">
                                <div class="row register-form">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="Username " name="fname"  required/>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password " id="password" name="password"  required/>
                                        </div>
                                        
                                        <input type="submit" class="btnRegister" name="patsub1" onclick="return checklen();" value="login"/>
                                    </div>

                                </div>
                            </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    </html>

  