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
		
                  <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "4956";
                    $dbname = "mcbs";
		 			
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    $sql1 = "SELECT * FROM stops where s_name='$_GET[source]' ";
                    if (!$conn->query($sql1))
                    {
                        die('Error: ' . $conn->error);
                    }
                    $result1 = $conn->query($sql1);
                    $row1 = $result1->fetch_array(MYSQLI_ASSOC) ;
					$s_stop_id = $row1['stop_id'];	
	 				$s_r_no = $row1['r_no'];
                    	
		 			
	 				
		 			$sql2 = "SELECT * FROM stops where s_name='$_GET[destination]' ";
                    if (!$conn->query($sql2))
                    {
                        die('Error: ' . $conn->error);
                    }
                    $result2 = $conn->query($sql2);
                    $row2 = $result2->fetch_array(MYSQLI_ASSOC) ;
					$d_stop_id = $row2['stop_id'];	
                    $d_r_no = $row2['r_no'];   			
	 				
	 				
		 			if($s_r_no==$d_r_no)
					{
						?>
						<div id="table" class="container text-center">
						<table class="table">
						  <thead class="thead-dark">
							<tr>
							  <th scope="col">Bus Id</th> 
							  <th scope="col">Bus No</th>
							  <th scope="col">Bus Type</th>
							  <th scope="col">Seat Type</th>
								<th scope="col">AC/Non-AC</th>	
								<th scope="col">Arrival Time at Source</th>
								<th scope="col">Arrival Time at Destination</th>
							   <th scope="col">Check Routes</th>	
							</tr>
						  </thead>
						  <tbody>
						<?php if($s_stop_id<$d_stop_id)
								$path = 'D';
						else
							$path = 'U';
						
						$sql3 = "SELECT distinct b_id FROM bus inner join stops where bus.r_no=stops.r_no and path='$path' and bus.r_no=$d_r_no ";
						if (!$conn->query($sql3))
						{
							die('Error: ' . $conn->error);
						}
						$result3 = $conn->query($sql3);
						while ($row3 = $result3->fetch_array(MYSQLI_ASSOC)) {
						$b_id = $row3['b_id'];
						
						
						$sql4 = " select * from bus where b_id=$b_id ";
						if (!$conn->query($sql4))
						{
							die('Error: ' . $conn->error);
						}
						$result4 = $conn->query($sql4);
						while ($row4 = $result4->fetch_array(MYSQLI_ASSOC)) {
                        $field1name = $row4['b_id'];
						$field2name = $row4['b_no'];
                        $field3name = $row4['b_name'];
                        $field4name = $row4['seat_type'];
						$b_type = $row4['b_type'];	
                        
						$sql5 = "SELECT * FROM timing where s_id=$s_stop_id and b_id=$b_id ";
						if (!$conn->query($sql5))
						{
							die('Error: ' . $conn->error);
						}
						$result5 = $conn->query($sql5);
						$row5 = $result5->fetch_array(MYSQLI_ASSOC) ;	
						$s_time = $row5['time'];
							
						$sql6 = "SELECT * FROM timing where s_id=$d_stop_id and b_id=$b_id ";
						if (!$conn->query($sql6))
						{
							die('Error: ' . $conn->error);
						}
						$result6 = $conn->query($sql6);
						$row6 = $result6->fetch_array(MYSQLI_ASSOC) ;	
						$d_time = $row6['time'];	
						
							
						echo '<tr> 
                                  <td>'.$field1name.'</td> 
                                  <td>'.$field2name.'</td> 
                                  <td>'.$field3name.'</td>	
                                  <td>'.$field4name.'</td>
								  <td>'.$b_type.'</td>
								  <td>'.$s_time.'</td>
								  <td>'.$d_time.'</td>
								  <td><button type="button" class="btn btn-outline-dark">Go &raquo</button></td> 
							  </tr>';
						}
	 				}?>
							</tbody>
							</table>
							</div>
				<?php	}
		 			else
					{ ?>
							 <h3 style="margin-top:50px;" class="container text-center">No direct Buses available</h3>
							
							<div id="table" class="container text-center">
							<table class="table">
							  <thead class="thead-dark">
								  
								<tr>
								  <th scope="col">Bus Id</th> 
								  <th scope="col">Bus No</th>
								  <th scope="col">Bus Type</th>
								  <th scope="col">Seat Type</th>
									<th scope="col">AC/Non-AC</th>
									<th scope="col">Arrival Time at Source</th>
									<th scope="col">Arrival Time at Majestic</th>
								   <th scope="col">Check Routes</th>	
								</tr>
							  </thead>
							  <tbody>
						<?php $sql7 = "SELECT * FROM stops where s_name='Majestic' ";
						if (!$conn->query($sql7))
						{
							die('Error: ' . $conn->error);
						}
						$result7 = $conn->query($sql7);
						$row7 = $result7->fetch_array(MYSQLI_ASSOC) ;
						$m_stop_id = $row7['stop_id'];
						$m_r_no = $row7['r_no'];
						if($s_stop_id<$m_stop_id)
							$path = 'D';
						else
							$path = 'U';
						
						$sql8 = "SELECT distinct b_id FROM bus inner join stops where bus.r_no=stops.r_no and path='$path' and bus.r_no=$s_r_no ";
						if (!$conn->query($sql8))
						{
							die('Error: ' . $conn->error);
						}
						$result8 = $conn->query($sql8);
						while ($row8 = $result8->fetch_array(MYSQLI_ASSOC)) {
						$b_id = $row8['b_id'];
						
						$sql9 = " select * from bus where b_id=$b_id ";
						if (!$conn->query($sql9))
						{
							die('Error: ' . $conn->error);
						}
						$result9 = $conn->query($sql9);
						while ($row9 = $result9->fetch_array(MYSQLI_ASSOC)) {
                        $field1name = $row9['b_id'];
						$field2name = $row9['b_no'];
                        $field3name = $row9['b_name'];
                        $field4name = $row9['seat_type'];
                        $b_type1 = $row9['b_type'];
						$sql11 = "SELECT * FROM timing where s_id=$s_stop_id and b_id=$b_id ";
						if (!$conn->query($sql11))
						{
							die('Error: ' . $conn->error);
						}
						$result11 = $conn->query($sql11);
						$row11 = $result11->fetch_array(MYSQLI_ASSOC) ;	
						$s_time = $row11['time'];
							
						$sql12 = "SELECT * FROM timing where s_id=$m_stop_id and b_id=$b_id ";
						if (!$conn->query($sql12))
						{
							die('Error: ' . $conn->error);
						}
						$result12 = $conn->query($sql12);
						$row12 = $result12->fetch_array(MYSQLI_ASSOC) ;	
						$m_time = $row12['time'];	
						
							
						echo '<tr> 
                                  <td>'.$field1name.'</td> 
                                  <td>'.$field2name.'</td> 
                                  <td>'.$field3name.'</td>	
                                  <td>'.$field4name.'</td>
								  <td>'.$b_type1.'</td>
								  <td>'.$s_time.'</td>
								  <td>'.$m_time.'</td>
								  <td><button type="button" class="btn btn-outline-dark">Go &raquo</button></td> 
							  </tr>';
						}
	 				}  ?> </tbody>
            			</table> 	
						</div>	
						<div id="table" class="container text-center">
						<table class="table">
						  <thead class="thead-dark">
							<tr>
							  <th scope="col">Bus Id</th> 
							  <th scope="col">Bus No</th>
							  <th scope="col">Bus Type</th>
							  <th scope="col">Seat Type</th>
								<th scope="col">AC/Non-AC</th>
								<th scope="col">Arrival Time at Majestic</th>
								<th scope="col">Arrival Time at Destination</th>
							   <th scope="col">Check Routes</th>	
							</tr>
						  </thead>
						  <tbody>
						<?php if($m_stop_id<$d_stop_id)
								$path1 = 'D';
						else
							$path1 = 'U';
						
					 	$sql31 = "SELECT * FROM stops where s_name='Majestic' and r_no=$d_r_no";
						if (!$conn->query($sql31))
						{
							die('Error: ' . $conn->error);
						}
						$result31 = $conn->query($sql31);
						$row31 = $result31->fetch_array(MYSQLI_ASSOC) ;
						$m_stop_id1 = $row31['stop_id'];
					 	//echo $m_stop_id1;
						$sql21 = "SELECT distinct b_id FROM bus inner join stops where bus.r_no=stops.r_no and path='$path1' and bus.r_no=$d_r_no ";
						if (!$conn->query($sql21))
						{
							die('Error: ' . $conn->error);
						}
						$result21 = $conn->query($sql21);
						while ($row21 = $result21->fetch_array(MYSQLI_ASSOC)) {
						$b_id1 = $row21['b_id'];
						
						$sql22 = " select * from bus where b_id=$b_id1 ";
						if (!$conn->query($sql22))
						{
							die('Error: ' . $conn->error);
						}
						$result22 = $conn->query($sql22);
						while ($row22 = $result22->fetch_array(MYSQLI_ASSOC)) {
                        $field21name = $row22['b_id'];
						$field22name = $row22['b_no'];
                        $field23name = $row22['b_name'];
                        $field24name = $row22['seat_type'];
                        $b_type2 = $row22['b_type'];
						$sql23 = "SELECT * FROM timing where s_id=$m_stop_id1 and b_id=$b_id1 ";
						if (!$conn->query($sql23))
						{
							die('Error: ' . $conn->error);
						}
						$result23 = $conn->query($sql23);
						$row23 = $result23->fetch_array(MYSQLI_ASSOC) ;	
						$m_time2 = $row23['time'];
							
						$sql24 = "SELECT * FROM timing where s_id=$d_stop_id and b_id=$b_id1 ";
						if (!$conn->query($sql24))
						{
							die('Error: ' . $conn->error);
						}
						$result24 = $conn->query($sql24);
						$row24 = $result24->fetch_array(MYSQLI_ASSOC) ;	
						$d_time = $row24['time'];	
						
							
						echo '<tr> 
                                  <td>'.$field21name.'</td> 
                                  <td>'.$field22name.'</td> 
                                  <td>'.$field23name.'</td>	
                                  <td>'.$field24name.'</td>
								  <td>'.$b_type2.'</td>
								  <td>'.$m_time2.'</td>
								  <td>'.$d_time.'</td>
								  <td><button type="button" class="btn btn-outline-dark">Go &raquo</button></td> 
							  </tr>';
						}
	 				}?>
							</tbody>
							</table>
							</div>
				<?php	}
	 		
                    $conn->close();
                ?>     
              
        
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