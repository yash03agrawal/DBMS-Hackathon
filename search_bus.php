<?php
	session_start();
	 if(empty($_SESSION['type']))
    {
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
         <meta name="author" content="Enigma">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="bus.png" />
        <title>
            MCBS
        </title>
        <style>
			body{
				 background-color: #f5f5f5;
			}
			</style>
		
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><i class="fas fa-bus"></i> MCBS </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

              <div class="collapse navbar-collapse" id="navbarContent">
               
                <ul class="navbar-nav ml-auto nav-right">
                    <li class="nav-item"><a class="nav-link" href="admin_login.php"><i class="fas fa-user-cog"></i> Admin Login</a></li>
                </ul>
              </div>
            </div>
        </nav>
		
		<div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Search for Buses</h4>
                    </header>
                    <article class="card-body">
                    <form method="get" action="search_bus_result.php">
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="source">Enter Source</label>
                                <select id="stop state" class="form cotrol" name="source">
									<option value="Kengeri" selected="">Kengeri</option>
									<option value="RV College">RV College</option>
									<option value="RR Gate">RR Gate</option>
									<option value="Nayandahalli Metro">Nayandahalli Metro</option>
									<option value="Magadi Road">Magadi Road</option>
									<option value="Majestic">Majestic</option>
									<option value="Vidhan Soudha">Vidhan Soudha</option>
									<option value="Banashankari">Banashankari</option>
									<option value="Jaynagar">Jaynagar</option>
									<option value="South End Circle">South End Circle</option>
									<option value="Chickpete">Chickpete</option>
									<option value="Sandal Soap Factory">Sandal Soap Factory</option>
									<option value="Yeshwantpur">Yeshwantpur</option>
									<option value="Cubbon Park">Cubbon Park</option>
									<option value="MG Road">MG Road</option>
									<option value="Trinity">Trinity</option>
									<option value="Indiranagar">Indiranagar</option>
									<option value="Bayappanhalli">Bayappanhalli</option>
									<option value="KR Puram">KR Puram</option>
									<option value="Marathalli">Marathalli</option>
								</select>
                            </div> <!-- form-group end.// -->
							
                            <div class="col form-group">
                                <label for="destination">Enter Destination</label>
                                <select id="stop state" class="form cotrol" name="destination">
									<option value="Kengeri" >Kengeri</option>
									<option value="RV College" selected="">RV College</option>
									<option value="RR Gate">RR Gate</option>
									<option value="Nayandahalli Metro">Nayandahalli Metro</option>
									<option value="Magadi Road">Magadi Road</option>
									<option value="Majestic">Majestic</option>
									<option value="Vidhan Soudha">Vidhan Soudha</option>
									<option value="Banashankari">Banashankari</option>
									<option value="Jaynagar">Jaynagar</option>
									<option value="South End Circle">South End Circle</option>
									<option value="Chickpete">Chickpete</option>
									<option value="Sandal Soap Factory">Sandal Soap Factory</option>
									<option value="Yeshwantpur">Yeshwantpur</option>
									<option value="Cubbon Park">Cubbon Park</option>
									<option value="MG Road">MG Road</option>
									<option value="Trinity">Trinity</option>
									<option value="Indiranagar">Indiranagar</option>
									<option value="Bayappanhalli">Bayappanhalli</option>
									<option value="KR Puram">KR Puram</option>
									<option value="Marathalli">Marathalli</option>
								</select>
                            </div> <!-- form-group end.// -->
                        </div>
						<div class="form-group">
                            <button type="submit" id="search" class="btn btn-primary btn-block"> Search  </button>
                        </div> <!-- form-group// --> 
                    </form>
                    </article> <!-- card-body end .// -->
                    </div> <!-- card.// -->
                </div> <!-- col.//-->
            </div> <!-- row.//-->
        </div>
		
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
		</body>
		<?php }
		else if($_SESSION['type']=="Admin")
			header("Location:admin.php");
		else
		{
			header("Location:access_deny.html");
		}
		?>
</html>