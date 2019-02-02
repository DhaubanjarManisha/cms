<?php

class Article{
	public function fetch_all(){
		global $pdo;
		$query = $pdo -> prepare("SELECT * FROM articles");
		$query -> execute();
		return $query->fetchAll();
		}

		public function fetch_data($article_id){
			global $pdo;
			$query = $pdo-> prepare("SELECT * FROM articles WHERE article_id=?");
			$query->bindValue(1,$article_id);
			$query -> execute();
			return $query->fetch();

		}
		public function updatepage($title,$details,$id){
			$title=$this->real_escape_string($title);
			$details=$this->real_escape_string($details);
			$update="UPDATE articles SET article_title='$title', article_content='$content' WHERE article_id='$id'";
			$result=$this->query($update) or die($this->error);
			if($result){
				return "Value is updated";
			}else{
				return "Some error";
			}
		}
		
	} 
	?>
