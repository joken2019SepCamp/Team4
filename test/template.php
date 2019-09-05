<html>
<head>
<title><%PAGETITLE></title>
</head>
<body>

<h1><%PAGETITLE></h1>

<h2>記事本文</h2>
<%PAGECONTENTS>

<h2>コメントする</h2>
<form method="POST" action="comments.php" name="comment_form">
<input type="hidden" name="pid" value="<%PAGEID>">	<!-- ※1 -->
名前：<input type="text" name="cname" size="20"><br>
コメント：<br>
<textarea name="ctext" rows="5" cols="30">
</textarea><br>
<input type="submit" value="コメントする">
</form>

<h2>この記事へのコメント</h2>
<?php
// ※2 コメントファイルを読み込み
if(file_exists("<%PAGEID>.dat")) {
  include("<%PAGEID>.dat");
}
?>

</body>
</html>