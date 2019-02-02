<?php
	session_start();
	include_once('../includes/connection.php');

	if (isset($_SESSION['logged_in'])) {
		//display add page
		
		if (isset($_POST['title'], $_POST['details'])) {

		$title = $_POST['title'];
		$details = nl2br($_POST['details']);
	

		if (empty($title) or empty($details) ) {
			
			$error = "ALL FIELD MUST BE FILLED!!";
		}else{
			$query = $pdo->prepare("INSERT INTO articles(article_title,article_content,article_details) VALUES(?,?,?)");
			$query->bindValue(1, $title);
			$query->bindValue(2, $details);
			$query->bindValue(3, $details);
			
			
			$query->execute();
			header('Location:index.php');

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
			<br>
			<h4>Add Category</h4>
			<?php if (isset($error)) { ?>
				<small  style="color:#aa0000;"><?php echo $error; ?></small>
				<br><br>
			<?php } ?>

			<form action="add.php" method="post" autocomplete="off">
				
				<input type="text" name="title" placeholder="Title"><br><br>
				<textarea rows="15" cols="40" placeholder="Details" name="details" id="details"></textarea><br><br>
				
		
				<input type="submit" value="Add Category"><br>
			</form>
			
			</div>

		</body>
	</html>
	
		<?php

	}else{
		header('Location:index.php');
	}
?>