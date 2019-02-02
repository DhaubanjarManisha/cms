<?php 
include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;
$articles = $article->fetch_all();


?>
<html>
<head>

<title>Content Management System</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
<div class="container">
	<a href="index.php" id="logo">CMS</a>
    <ol>
    	<?php foreach ($articles as $article){?>
    	<li>
    		<a href="article.php?id=<?php echo $article['article_id']; ?>"><?php echo $article['article_title'];?> </a><br>
    		
    		
    	</li>

    	
    	 	
    	<?php } ?>
    	
</ol>
    
</br>
<small><a href="admin">Admin</small>
</div>

</body>
</html>
