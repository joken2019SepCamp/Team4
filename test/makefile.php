<html>
<head>
<title>ブログ作成</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>

<?php
$template = "template.php";	// テンプレートファイル名
$pagelog = "pages.dat";		// 作成したページ一覧を保存するファイル

if ($_POST{"honbun"}) {
	// ※1 POSTデータを全て受け取りエスケープして変数に入れる 
	foreach($_POST as $k => $v) { 
		if(get_magic_quotes_gpc()) { $v=stripslashes($v); }
		// $v=htmlspecialchars($v);
		$array[$k]=$v; 
	} 
	extract($array);

	// 文字コードをEUCに変換
	$honbun = mb_convert_encoding($honbun, "UTF-8","AUTO");
	$pagetitle = mb_convert_encoding( htmlspecialchars($pagetitle), "UTF-8","AUTO");

	// 改行を<br>タグに変換
	$honbun = nl2br($honbun);

	// 乱数を生成してファイル名に
    $pageid = rand( 1000000, 9999999);
	$filename = $pageid . ".php";

    // ※1 置換対象となる独自タグを設定
	$originaltag{"PAGETITLE"} = $pagetitle;
	$originaltag{"PAGECONTENTS"} = $honbun;
    $originaltag{"PAGEID"} = $pageid;

    // ※2 メッセージ表示
    if (createNewPage( $filename, $template, $pagetitle, $honbun)) 
    {
        recordPages( $pageid, $pagetitle);	// ページを保存
        echo $filename. "を生成し、書き込みを行いました。";
    } 
    else 
    {
		echo "ファイルの生成に失敗しました。";
	}
} 
else 
{
	echo "フォームから記事の内容を送信してください。";
}

// ※3 ページ生成関数 createNewPage()
function createNewPage( $filename, $template,$originaltag) {
	// ※4 テンプレートファイルの読み込み
	if ( ($contents = file_get_contents( $template)) == FALSE) { return false; }

    // ※2 独自タグを置換
	foreach ($originaltag as $key => $var) {
		$contents = str_replace( "<%".$key.">", $var, $contents);
	}

	// タイトルと記事本文を挿入
	$contents = str_replace( "<%PAGETITLE>", $pagetitle, $contents);
	$contents = str_replace( "<%PAGECONTENTS>", $honbun, $contents);

	// ※5 ファイル生成＆書き込み
	//if ( ($handle = fopen( $filename, 'w')) == FALSE) { return false; }
	//fwrite( $handle, $contents);
	//fclose( $handle );

	return true;
}
// ※1 作成したページをページ一覧に保存
function recordPages( $pageid, $pagetitle) {
	global $pagelog;	// ※2

	$savedata = $pageid . "<>" . htmlspecialchars($pagetitle) . "\n";

	// ファイル生成＆書き込み
	if ( ($handle = fopen( $pagelog, 'a')) == FALSE) { return false; }
	fwrite( $handle, $savedata);
	fclose( $handle );

	return true;
}
?>

</body>
</html>
