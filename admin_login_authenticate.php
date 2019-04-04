<?php
 
$servername = "localhost";
$username = "root";
$password = "4956";
$dbname = "mcbs";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$input_uname = $_POST['email'];
$input_pass = $_POST['password'];

$sql="select * from user";
if (!$conn->query($sql))
  {
    die('Error: ' . $conn->error);
  }

$result = $conn->query($sql);
$flag=0;
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
    $uname=$row['email'];
    $pass=$row['password'];
    $t=$row['type'];

    if((strcmp($input_uname,$uname)==0)&&(strcmp($input_pass,$pass)==0))
    {
			$flag=1;

			if($t=="admin")
			{   
					session_start();
					$_SESSION['type']='Admin';
					$_SESSION['email']=$uname;
					header("Location: admin.php");
			}
       		else
			{
				header("Location:access_deny.html");
			}
	}
}
if($flag==0)
{
    $message = "Username and/or Password incorrect.\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script>setTimeout(\"location.href = 'admin_login.php';\",100);</script>";
}
$conn->close();

?>