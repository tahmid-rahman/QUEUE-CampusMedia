<!DOCTYPE html>
<html>

<head>
	<title>Join with us!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/login_signup.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	<link rel="icon" href="/QUEUE/assets/image/Q.png" type="image/icon type">

</head>

<body>
	<div>
		<div class="alart">
			
		</div>
		<div class="main">
			<input type="checkbox" id="chk" aria-hidden="true">
			<div class="login">
				<form action="assets/php/action.php?login" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button type="submit" name="login_section" value="Login">Login</button>
					<a href="?recover" class="fpass">Forget password?</a>

				</form>
			</div>

			<div class="signup">
				<form action="assets/php/action.php?signup" method="POST">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="username" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="text" name="name" placeholder="Fulname" required="">
					<button type="submit" name="signup_section">Sign up</button>
				</form>
			</div>
		</div>
	</div>