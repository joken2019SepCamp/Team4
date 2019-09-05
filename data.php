<<<<<<< HEAD
<?php
    $dsn = 'mysql:dbname=team4;host=localhost;charset=utf8';
    $user = 'root';
    $password ='pdH301LX5nKQ';

    $people = $_POST['people'];
    $comment = $_POST['comment'];
    $day = date('Y-m-d H:i:s');
    $article_id = $_POST['article_id'];
    try{
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO comment2 (people, comment, day) VALUES (:people, :comment, '{$day}')";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':people', $people, PDO::PARAM_STR);
        $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
        $stmt->execute();
    }catch (PDOException $e){
        print('Connection failed:'.$e->getMessage());
        die();
    }
?>

<html>
    <head>
        <meta http-equiv="Refresh" content="0; URL=news.php?id= <?php echo ($article_id)?>">
    </head>
</html>
=======
<?php
    $dsn = 'mysql:dbname=team4;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';

    $people = $_POST['people'];
    $comment = $_POST['comment'];
    $day = date('Y-m-d H:i:s');
    $article_id = $_POST['article_id'];
    try{
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO comment2 (people, comment, day) VALUES (:people, :comment, '{$day}')";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':people', $people, PDO::PARAM_STR);
        $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
        $stmt->execute();
    }catch (PDOException $e){
        print('Connection failed:'.$e->getMessage());
        die();
    }
?>

<html>
    <head>
        <meta http-equiv="Refresh" content="0; URL=news.php?id= <?php echo ($article_id)?>">
    </head>
</html>
>>>>>>> d0365381c4786f8e3216a25119da641eea62ce76
