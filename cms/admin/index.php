<?php
	session_start();
	include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
	//display index
	?>
	<html>
		<head>

			<title>Content Management System</title>
			<link rel="stylesheet" type="text/css" href="../style.css"/>
		</head>

		<body>
			<div class="container">
			<a href="index.php" id="logo">CMS</a>
			<br>
			<ol>
				<li><a href="add.php">Add Category</a></li><br>
				<li><a href="delete.php">Delete Category</a></li><br>
				<li><a href="logout.php">LogOut</a></li><br>
			</ol>
			</div>

		</body>
	</html>


	<?php
	
}else{
	//display login
	if (isset($_POST['username'], $_POST['password'])) {

		$username = $_POST['username'];
		$password = $_POST['password'];

		if (empty($username) or empty($password)) {
			
			$error = "ALL FIELD MUST BE FILLED!!";
		}else{

			$query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");
			$query->bindValue(1, $username);
			$query->bindValue(2, $password);

			$query->execute();

			$num = $query->rowCount();

			if ($num == 1) {
				//user entered correct details
				$_SESSION['logged_in'] = true ;
				header('Location: index.php');
				exit();

				
			}else{
				//users entered incorrect details
				$error = "Incorrect Details";
			}
		}
	}
	?>

	<html>
		<head>

			<title>Content Management System</title>
			<link rel="stylesheet" type="text/css" href="../style.css"/>
		</head>

		<body>
			<div class="container">
			<a href="index.php" id="logo">CMS</a>

			<br><br>

			<?php if (isset($error)) { ?>
				<small  style="color:#aa0000;"><?php echo $error; ?></small>
				<br><br>
			<?php } ?>

			<form action="index.php" method="post" autocomplete="off">
				
				<input type="text" name="username" placeholder="username">
				<input type="password" name="password" placeholder="password">
				<input type="submit" value="Login">

			</form>

    
			</div>

		</body>
	</html>

	<?php
}
?>
