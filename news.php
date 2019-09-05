<?php
	$dsn = 'mysql:dbname=team4;host=localhost;charset=utf8';
	$user = 'root';
	$password = '';

	try{
		$dbh = new PDO($dsn, $user, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$article_id = $_GET['id'];

		$sql = "SELECT * FROM comment where id=$article_id";
		$stmt = $dbh->query($sql);
		$article = $stmt->fetch(PDO::FETCH_ASSOC);
	}catch (PDOException $e){
		print('Connection failed:'.$e->getMessage());
		die();
	}

	
	try{
		$dbh = new PDO($dsn, $user, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$sql = "SELECT * FROM comment2 ORDER BY id ASC";
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$data =array();
		$count = $stmt->rowCount();
		while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
			$data[]=$row;	
		}
	}catch (PDOException $e){
		print('Connection failed:'.$e->getMessage());
		die();
	}
?>

<html>
	<head>
		<meta charset = "UTF-8">
		<title><?= $article['title'] ?></title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel = "stylesheet" href = "style.css">
	</head>
	<body>
		<article>

			<h1>タイトル：<?= $article['title'] ?></h1>
			<p>投稿者：<?= $article['people'] ?></p>
			<div class="NEW_THREAD" style="z-index:  1; width: 93%; margin: 0.5em auto 0.75em auto; padding: 0.75em; border: 1px solid #333; color: #333; border-radius: 0.75em / 0.75em; background-color: rgba(0,0,0,0); font-size: 1.00em;">
				<p><?= nl2br($article['maintext']); ?></p><br>
				<link rel = "stylesheet" href = "style.css">
			</div>
			<p>この投稿のタグ:<a href="http:tag.php">開発</a>　</p><br>

		</article>

		<h2>コメント欄</h2>
		<div class="NEW_THREAD" style="z-index:  1; width: 93%; margin: 0.5em auto 0.75em auto; padding: 0.75em; border: 1px solid #333; color: #333; border-radius: 0.75em / 0.75em; background-color: rgba(0,0,0,0); font-size: 1.00em;">
			<p><?php foreach($data as $row):  ?>
				<?php echo $row['comment']; ?><br>
				[ <?php echo $row['people']; ?> ]
				<?php echo $row['day']; ?><br>
				<br>
				<?php endforeach; ?>
			</p>
		</div>
		<div class="NEW_THREAD" style="z-index:  1; width: 93%; margin: 0.5em auto 0.75em auto; padding: 0.75em; border: 1px solid #333; color: #333; border-radius: 0.75em / 0.75em; background-color: rgba(0,0,0,0); font-size: 1.00em;">
            <form action="data.php" method="POST">
				<a name="new_thread"></a>
				投稿者　　：　<input type="text" name="people" style="width: 25em;" required><br>
				コメント　：　<textarea style="vertical-align: top; min-width: 80%; height: 10em; word-wrap: break-word;" rows="4" cols="12" name="comment" required></textarea><br>
				　　　　　　　<input type="submit" value="返信" name="submit" style="position: absolute"><br>
				<input type="hidden" name="article_id" value="<?= $article_id ?>">
            </form>
        </div>
	</body>
	<footer>
		<p><a href="http:index.php">ホーム</a>に戻る</p>
		<p>Copyright (c) 2019 404 NOT FOUND All Right Reserved.</p>
	</footer>
</html>