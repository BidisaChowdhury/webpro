<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Reset Password</title>
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
			$opass=$_POST['oldpassword'];
			$npass=$_POST['newpassword'];
			$cpass=$_POST['confirmpassword'];
			$conn = new mysqli("localhost", "root", "","innovacion");
			if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
			} 
			$sql="select * from user where email='$id' and password='$opass'";
			$res=$conn->query($sql);
			$row=$res->fetch_array();
			if ($row[3]==$opass)
			{
				if($npass==$cpass)
				{
					$sql1="update user set password='$npass' where email='$id'";
					$conn->query($sql1);
					echo "<script>window.location.href='login.html'</script>";
				}
				else{
					echo "<script>alert('Wrong password')</script>";
					echo "<script>window.location.href='resetpassword.html'</script>";
				}
			}
			else
			{
				echo "<script>alert('Invalid user')</script>";
				echo "<script>window.location.href='resetpassword.html'</script>";
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