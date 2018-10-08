


<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<title>Contact Us</title>

	<style>

		*{
			margin: 0;
			padding: 0;
		}

		html{
			background: url('./wallpaper-galaxy-15-HD-Collections-Wonderful-Galaxy-Wallpaper.jpg');
			background-repeat: no-repeat;
			-webkit-background-size: cover;
			background-size: cover;
		}

		body{
			/* position: absolute; */
			width = 100%;
			height: vh%
			margin: 0;
			padding: 0;
			z-index: -1;
		}

		.container{
			width: 90%;
			/* height: 100%; */
			margin: auto;
		}

		.center{
			position: relative;
			top: 70px;
			margin: auto auto;
		}

		.navbar{
			background-color: rgb(35,35,35);
			/* width: 100%; */
			border-bottom: 3px rgb(120,120,255) solid;
		}

		.navbar-default{
			/* position: absolute; */
			top: 0px;
			padding: 20px 0 20px 40px;
			height: 40%;
		}

		.navbar-header{
			margin: auto;
			height: 100%;
		}

		.navbar-brand{
			position: relative;
			text-decoration: none;
			color: white;
			color: rgb(120,120,255);
			display: inline-block;
			font-size: 130%;
			/* margin-top: 20px; */
			top: 33%;
			/* margin-bottom: auto; */
			/* margin: auto; */
		}

		nav{
			margin: 0;
			padding: 0;
		}

		.form-control{
			width: 40%;
			height: 30px;
		}

		.form-group{
			margin: auto;
			text-align: center;
		}

		.form-group textarea{
			height: 60px;
			border: 1px rgb(200,200,200) solid;
			padding: 5px 10px;
			border-radius: 5px;
		}

		.form-group input{
			height: 40px;
			border: 1px rgb(200,200,200) solid;
			padding: 2px 10px;
			border-radius: 5px;
		}

		.form-group label{
			margin: 0px auto 20px auto;
			padding-top: 20px;
			margin-bottom: 10px;
			display: block;
			width: 42%;
			text-align: left;
			color: white;
		}

		.btn{
			border: 0;
			padding: 12px 40px;
		}

		.btn-primary{
			background-color: rgb(60,100,255);
			color: white;
			font-weight: bold;
		}

		.alert{
			padding: 20px 10px 20px 10px;
			margin: 20px auto 0 auto;
		}

		.alert p{
			padding:0;
			margin: 5px 0 0 0;
		}

		.alert-danger{
			background-color: rgb(255,80,80);
			color: white;
			text-transform: capitalize;
			text-align: center;
		}

		.alert-success{
			background-color: rgb(0,220,0);
			color: white;
			text-transform: capitalize;
			text-align: center;
		}

		.alert-warning{
			background-color: rgb(255,215,0);
			color: white;
			text-transform: capitalize;
			text-align: center;
		}

	</style>

</head>

	<body>

	<?php

		function echo_n($string = ''){
			echo "$string <br>";
		}

		$msg = '';
		$msg_class = '';

		if(filter_has_var(INPUT_POST, 'submit')){
			//echo_n('submitted');

			$name = htmlspecialchars($_POST['name']);
			$email_address = htmlspecialchars($_POST['email']);
			$message = htmlspecialchars(trim($_POST['message']));

			if(!empty($name) && !empty($email_address) && !empty($message)){
				//passed
				//echo_n("passed.");

				if(filter_var($email_address, FILTER_VALIDATE_EMAIL)){

					$to_email = 'kylebellle7@gmail.com';
					$email_subject = 'caontact request from '.$name;
					$email_body = "<h2>Contact request</h2>
								   <h4>Name: </h4><p>$name </p>
								   <h4>Email: </h4><p>$email_address </p>
								   <h4>Message: </h4><p>$message </p>
					";

					$email_headers = "MIME-Version:1.0"."\r\n";
					$email_headers .= "Content-Type: text/html;charset=UTF-8"."\r\n";
					$email_headers .= "From: $name < $email_address >" . "\r\n";

					if(mail($to_email, $email_subject, $email_body, $email_headers)){
						$msg = 'your massage has been sent';
						$msg_class = 'alert-success';
					}else{

						$msg = 'Warning: email not sent try again!';
						$msg_class = 'alert-warning';
					}

				}else{

					$msg = 'Enter valid email!';
					$msg_class = 'alert-danger';
				}

			}else{
				//failed
				$msg = 'All fields required!';
				$msg_class = 'alert-danger';

			}
		}

	?>

		<nav class = "navbar navbar-default">

			<div class="container">

				<div class="navbar-header">

					<a href="index.php" class="navbar-brand">My Website</a>

				</div>

			</div>

		</nav>

		<div>

		<div class="container">

			<?php if($msg != ''): ?>

				<div class="form-control alert <?php echo "$msg_class" ?>">

					<?php echo "<p>$msg </p>" ?>

				</div>

			<?php endif; ?>

			<form method="POST" action="" class="center">

				<div class="form-group">

					<label for="name">Name</label>
					<input type="text" name="name" class="form-control" placeholder="someone" value="<?php echo isset($name) ? "$name" : ''; ?>">

				</div>

				<div class="form-group">

					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" placeholder="someone@example.com" value="<?php echo isset($email_address) ? "$email_address" : ''; ?>">

				</div>

				<div class="form-group">

					<label for="message">Message</label>
					<textarea name="message" class="form-control" cols="30" rows="5" placeholder="message to send"><?php echo isset($_POST['message'])?$_POST['message']:'';?></textarea>

				</div>

				<br>

				<div class="form-group">

					<button class="btn btn-primary" name="submit" type="submit">Submit</button>

				</div>

			</form>

		</div>

	</div>

	</body>

</html>
