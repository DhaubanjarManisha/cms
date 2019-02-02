<?php
include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;
 if(isset($_GET['id'])){
 	//display the article
 	$id= $_GET['id'];
 	$data= $article->fetch_data($id);
 ?>
 <html>
<head>

<title>Content Management System</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
<div class="container">
	<a href="index.php" id="logo">CMS</a>
   <h4>
   		<?php echo $data['article_title'];?>
   	</h4> 
   	<p>
   		<?php echo $data['article_content'];?>
   	</p>
   	<p>
   		<?php echo $data['article_details'];?>
   	</p>
      
   	<a href="index.php">&larr; Back</a>

</div>

</body>
</html>

<?php
 }else{
 	header('Location: index.php');
 	exit();
 }
?>