<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="mystyle.css" />
</head>

<body>
<header class="myheader">
    	<p>
        	<span class="headertxt" style="float:left">
        		wEb pRo~Innovacion
            </span>
			<span style="float:right">
				<a href='logout.php'><button type='submit' class='btn'>LOG OUT </button></a>
            </span>
        </p>
    </header>
    <div class="bodytxt">
    <?php
			$id=$_POST['email'];
			$pass=$_POST['password'];
			$conn = new mysqli("localhost", "root", "","innovacion");
			if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
			} 
			$sql="select * from user where email='$id' and password='$pass'";
			$res=$conn->query($sql);
			$c=$res->num_rows;
			if($c>=1)
			{
						session_start();
						$row=$res->fetch_array();
						echo "<table class='display' border='1' align='center'>";
						echo "<tr><th>First Name</th><td>".$row[0]."</td></tr>";
						echo "<tr><th>Last Name</th><td>".$row[1]."</td></tr>";
						echo "<tr><th>Email</th><td>".$row[2]."</td></tr>";
						echo "</table>";
			}
			else
			{
				echo "<script>alert('Invalid user')</script>";
				echo "<script>window.location.href='login.html'</script>";
			}
			$conn->close();
			
	?>
	</div>
    <footer class="myfooter">
    	<marquee class="footertxt" behavior="scroll">
        	For more information please contact wEb pRo...
        </marquee>
    </footer>
</body>
</html>