<?php
    $dsn = 'mysql:dbname=team4;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';

    $title = $_POST['title'];
    $people = $_POST['people'];
    $maintext = $_POST['maintext'];
    $tag = $_POST['tag'];

    try{
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO comment (title, people, maintext, tag) VALUES (:title, :people, :maintext, :tag)";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':people', $people, PDO::PARAM_STR);
        $stmt->bindValue(':maintext', $maintext, PDO::PARAM_STR);
        $stmt->bindValue(':tag', $tag, PDO::PARAM_STR);

        $stmt->execute();
    }catch (PDOException $e){
        print('Connection failed:'.$e->getMessage());
        die();
    }
?>

<html>
    <head>
        <title>完了</title>
        <meta http-equiv="Refresh" content="3; URL=index.php">
    </head>
    <body>
        <P>投稿出来ました！</P>
        <img src="image/catpus_con.png" alt="キャットパス" title="catpus" width="1050">
    </body>
</html>
