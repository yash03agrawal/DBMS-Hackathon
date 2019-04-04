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
        
		<style type="text/css">
            #welcome{
                margin-top: 50px;
            }
			
			#table{
                margin-top: 50px;
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
		
		<div id="welcome" class="container text-center">
            <img src="images/welcome.png" class="rounded" alt="welcome" height="200" width="350">
        </div>
		
		 <div id="table" class="container text-center">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Bus Id</th> 
				  <th scope="col">Bus No</th>
                  <th scope="col">Bus Type</th>
                  <th scope="col">Seat Type</th>
				  <th scope="col">Source</th>
				  <th scope="col">Destination</th>
                  <th scope="col">Check Routes</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "4956";
                    $dbname = "mcbs";
		 			
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    $sql = "SELECT * FROM bus inner join route where bus.r_no = route.r_no and b_type='AC' ";
                    if (!$conn->query($sql))
                    {
                        die('Error: ' . $conn->error);
                    }
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        $field1name = $row['b_id'];
						$field2name = $row['b_no'];
                        $field3name = $row['b_name'];
                        $field4name = $row['seat_type'];
                        $field5name = $row['source'];
						$field6name = $row['destination'];
						$path = $row['path']; ?>
                        <tr> 
                                  <td><?php echo $field1name; ?></td> 
                                  <td><?php echo $field2name; ?></td> 
                                  <td><?php echo $field3name; ?></td>
                                  <td><?php echo $field4name; ?></td>
								<?php  
							 		if($path=='D')
								  {	?>
									<td><?php echo $field5name; ?></td>
								  	<td><?php echo $field6name; ?></td> <?php }
								  else
								  { ?>
								  	<td><?php echo $field6name; ?></td>
								  	<td><?php echo $field5name; ?></td>
								  <?php 
								  }
                                  echo '<td><button type="button" class="btn btn-outline-dark">Go &raquo</button></td> </tr>';
                            }
                    //$result->free();
                    $conn->close();
                ?>     
              </tbody>
            </table>
        </div>
        
        <script type="text/javascript">
            
            function handler(num){
                window.location.href = "bus_details.php?id=" + num;
            }
            
            var anchors = document.querySelectorAll(".btn");
            for (var i=0; i<anchors.length; i++) 
                anchors[i].setAttribute("value",i+1);
            for (var i=0; i<anchors.length; i++) {
               anchors[i].addEventListener("click", function() {
                   var sending=this.parentNode.parentNode.childNodes[1].innerHTML;
                   handler(sending);
                });
            }
        
        </script>
		
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
		