<?php
	session_start();
	include_once('../includes/connection.php');
	include_once('../includes/article.php');

	$article = new Article;
 	$articles= $article->fetch_all();
 ?>
<html>
<head>
	<title>Pages</title>
	<link rel="stylesheet" type="text/css" href="../style.css"/>
</head>
<body>
<div class="container">
<h4>Pages</h4>
<table>
	<thead>
		<tr>
					<th>ID</th>
					<th>Title</th>
					<th>content</th>
					<th>Details</th>
					<th>Action</th>
				</tr>
	</thead>
	<tbody>
	
					<?php foreach ($articles as $article){?>
    					echo '<tr>
    						<td> <?php echo $article['article_id']?></td>
							<td><?php echo $article['article_title']?></td>
							<td><?php echo $article['article_content']?></td>
							<td><?php echo $article['article_details']?></td>
							<td><a href="id="><a href="edit.php?id=<?php echo $article['article_id']; ?>">Edit</a><br></td>
    					</tr>';
    		<?php } ?>
	</tbody>
</table>	
</div>
</body>
</html>