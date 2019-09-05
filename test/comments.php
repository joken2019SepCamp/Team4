<html>
<head>
<title>コメント投稿</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>

<?php
if ($_POST{"ctext"}) {
	// POSTデータを全て受け取りエスケープして変数に入れる 
	foreach($_POST as $k => $v) { 
		if(get_magic_quotes_gpc()) { $v=stripslashes($v); }
		$v=htmlspecialchars($v);
		$array[$k]=$v; 
	} 
	extract($array);

	// 文字コードをEUCに変換
	$ctext = mb_convert_encoding($ctext, "UTF-8","AUTO");
	$cname = mb_convert_encoding($cname, "UTF-8","AUTO");

	// 改行を<br>タグに
	$ctext = nl2br($ctext);

	// コメント内容を編集
	$comment = $ctext . "<br><br>";
	$comment.= $cname . "　｜　";
	$comment.= date("Y年m月d日　g:i a");	// ※1 投稿日時
	$comment.= "<br><br><br>";

	// ※2 コメントファイルに追記
	if ( ($handle = fopen( $pid.".dat" , 'a')) == FALSE) { return false; }
	fwrite( $handle, $comment);
	fclose( $handle );

	echo "コメントを投稿しました。";
} else {
	echo "コメントを記入してください。";
}
?>

</body>
</html>
