//適宜記事ページに貼り付けてください
<html>
    <head>
    <link rel="stylesheet" href="review.css" type="text/css">
    </head>
    <body>
        <form method="POST" action="">
            <div id="iine">
                <input type="img" value="iine" name="sub1" src="img/iine">　
                <?php echo $IINE ?>
            </div>        
        </form>
    </body>      
</html>


//いいね機能の処理
<?php
    //DBから閲覧中のページのいいね・よくないね数を取得
    $sql = "SELECT * FROM iine WHERE $NUM"
    $IINE = $dbh->query($sql);
    
    //各ボタン押下時の処理
    if (isset($_POST["sub1"])) 
    {
        $kbn = htmlspecialchars($_POST["sub1"], ENT_QUOTES, "UTF-8");
        switch ($kbn) 
        {
            case "iine": 
                //いいね数を１加算
                $IINE++  
                //DB内のいいね数の更新
                $sql = "UPDATE * SET iine = :iine WHERE num = :num";
                // 更新する値と該当のIDは空のまま、SQL実行の準備をする
                $stmt = $dbh->prepare($sql);
                // 更新する値と該当のIDを配列に格納する
                $params = array(':iine' => $IINE, ':num' => $NUM);
                // 更新する値と該当のIDが入った変数をexecuteにセットしてSQLを実行
                $stmt->execute($params);
                // 更新完了のメッセージ
                echo 'いいねしました';
            break;    

            default:
            exit;
        }
    }
?>
