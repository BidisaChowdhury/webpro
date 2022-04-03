<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Signup</title>
<link rel="stylesheet" type="text/css" href="mystyle.css" />
</head>

<body>
<header class="myheader">
    	<p>
        	<span class="headertxt" style="float:left">
        		wEb pRo~Innovacion
            </span>
            <span style="float:right">
            </span>
        </p>
    </header>
    <div class="bodytxt">
    <?php
		$conn = new mysqli("localhost", "root", "","innovacion");
		if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
		} 
		$fn=$_POST["firstnm"];
		$ln=$_POST["lastnm"];
		$mail=$_POST["email"];
		$pass=$_POST["password"];
		$sql="select * from user where email='$mail'";
		$res=$conn->query($sql);
		$c=$res->num_rows;
		if($c>=1)
		{
			echo "<script>alert('You already have an account')</script>";
			echo "<script>window.location.href='login.html'</script>";
		}
		else
		{
			$sql="insert into user values('".$fn."','".$ln."','".$mail."','".$pass."')";
			if ($conn->query($sql) === TRUE) 
			{
				echo "<script>window.location.href='login.html'</script>";
			} 
		}
		$conn->close();
		
	?>
    </div>
    <footer class="myfooter">
    	<marquee class="footertxt" behavior="scroll">
        	For more information please contact with wEb pRo...
        </marquee>
    </footer>
</body>
</html>