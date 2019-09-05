<?php
	$dsn = 'mysql:dbname=team4;host=localhost;charset=utf8';
	$user = 'root';
	$password = 'pdH301LX5nKQ';

	try{
		$dbh = new PDO($dsn, $user, $password);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM comment ORDER BY id DESC";
		$stmt = $dbh->query($sql);
	}catch (PDOException $e){
		print('Connection failed:'.$e->getMessage());
		die();
	}
?>

<!DOCTYPE html>

<html lang="ja">
	<head>
		<meta charset="UTF-8">

		<link rel="stylesheet" href="style12.css">
		<link rel="stylesheet" href="index12.css">
		<link rel="stylesheet" href="link12.css">
		<link rel="shortcut icon" href="image/892e53fd07034b14f27fb87d4407d6fc.png.jpg">　<!--アイコンの画像-->
		<link rel="stylesheet" href="animation11.scss">

		<title>双方向性開発支援サイト</title>

	</head>

	<body>

		<div class="container">

			<header>

				<div class='box'>
					<div class='wave -one'></div>
					<div class='wave -two'></div>
					<div class='wave -three'></div>
					<div class='title'>双方向性開発支援サイト</div>
				</div>

					<h1 class="side-list-title">双方向性開発支援サイト</h1> <!--サイトのトップ名-->
					<nav class="global-nav">
					</nav>
			</header>

			<section class="main-content"><!--左側始まり-->
				<p><a href="post.php"><input type="button" value="投稿"></a></p>
			
			
				
				<div class="box7">
	
					<?php foreach ($stmt as $article) { ?>
      				<a href="news.php?id=<?= $article['id'] ?>"><?= $article['title'] ?></a><br>
    				<?php } ?>
					

				</div>
				<div class="paging">
					<ul class="nl">
						<li><span>前へ</span></li>
						<li><strong>1</strong></li>
						<li><a href="index1.html">2</a></li> <!--「a href=」の後にそれぞれ適当なリンクを貼り付けて-->
						<li><a href="index2.html">3</a></li>
						<li><a href="index3.html">4</a></li>
						<li><a href="index4.html">5</a></li>
						<li><a href="index1.html">次へ</a></li>
						</ul>
				</div>

			</section><!--左側終わり-->



			<aside class="sidebar"><!--右側始まり-->



				<h2>募集</h2>



				<p><a href="index.php"><input type="button" value="ホーム"></a></p>

				<p><a href="https://joken.ce.nihon-u.ac.jp"><input type="button" value="情研" class="btn1"></a></p><!--「a href=」の後にそれぞれ適当なリンクを貼り付けて-->

				<p><a href="https://portal.upex.ce.nihon-u.ac.jp/up/faces/up/po/Poa00601A.jsp"><input type="button" value="日大ポータル" class="btn2"></a></p>

				<p><a href="何かしらリンク"><input type="button" value="～" class="btn3"></a></p>
					
				<section id = "sns">
					<div class = "wrapper">
						<div class = "sns-box">
							<h3 class = "sub-title">Twitter</h3>
							<a class="twitter-timeline" href="https://twitter.com/404notf68181088?ref_src=twsrc%5Etfw">Tweets by 404notf68181088</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
						</div>    
					</div>
				</section>
					
			</aside><!--右側終わり-->
			<footer>
				<p>Copyright (c) 2019 404 NOT FOUND All Right Reserved.</p>
			</footer>

		</div>

	</body>

</html>
