<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login form</title>

	<!-- bootstrap v5.3 -->
	<?php echo link_tag("assets/bootstrap/index.min.css") ?>
	<?php echo script_tag("assets/bootstrap/index.bundle.min.js") ?>

	<!-- jquery v3.7.0 -->
	<?php echo script_tag("assets/jquery.js") ?>
</head>
	<body>

		
		<?php $this->load->view("login/form.php") ?>
		

	</body>
</html>