<html>
<head>
	<title></title>


	<link rel="stylesheet" href="../css/style.css">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</head>
<body>

			<div class="index">
            <div class="form">
            <div class="login">
                <div>
					<form class="navbar-form navbar-right" method="POST" action="../functions/register.php">
					<div class="signup__form">
                    <div class="login__row"><input type="text" name="fname"placeholder="First Name"class="form-control" required></div>
					 <div class="login__row"><input type="text" name="lname"placeholder="Last Name"class="form-control" required><div>
					 <select class="form-control" name="gender"required>
								<option>Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
                    <div class="login__row"><input type="text" placeholder="Username" name="username"class="form-control" required></div>
                    <div class="login__row"><input type="password" placeholder="Password" name="password" class="form-control" required></div>

					
					<button type="submit" value="Signup" class="btn btn-success">Sign Me Up</button>
                    <p class="login__signup">Already got an account? &nbsp;<a href="../index.php">Sign in</a></p>
					</div>
					</form>
                          
				
               </div> 
            </div>
			</div>
			</div>



</body>
</html>