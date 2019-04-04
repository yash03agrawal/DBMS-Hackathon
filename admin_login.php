<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
         <meta name="author" content="Enigma">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        
		<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
        <link rel="shortcut icon" href="bus.png" />
        <title>
            MCBS
        </title>
        <?php
	session_start();
	 if(empty($_SESSION['type']))
    {
		?>
    </head>
    <body class="text-center">
        
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"><i class="fas fa-bus"></i> MCBS </a>
                </div>
                
            </div>
        </nav>
        
        <form class="form-signin" method="post" action="admin_login_authenticate.php">
            <img class="mb-4" src="images/signin.png" alt="signin" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
<!--            <span id='message'></span>-->
            
            <button class="btn btn-lg btn-primary btn-block" id="signin" type="submit">Sign in</button>
            
        </form>
        
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