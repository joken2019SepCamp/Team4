<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset = "UFT-8">
        <title>投稿</title>
    </head>

    <body>
        <link rel="stylesheet" href="style12.css"><br>
        <div class="NEW_THREAD" style="z-index:  1; width: 93%; margin: 0.5em auto 0.75em auto; padding: 0.75em; border: 1px solid #333; color: #333; border-radius: 0.75em / 0.75em; background-color: rgba(0,0,0,0); font-size: 1.00em;">
            <form action="success.php" method="POST">
                <a name="new_thread"></a>
                <h3><span class="common">新規作成</span></h3>
                <p>
                    タイトル　：　<input type="text" name="title" style="width: 25em;" required><br>
                    投稿者　　：　<input type="text" name="people" style="width: 25em;" required>
                    　タグ：<select name="tag">
                            <option value="開発">開発</option>
                            <option value="企画">企画</option>
                            <option value="募集">募集</option>
                            <option value="紹介">紹介</option>
                    </select>
                    <br>
                    本文　　　：　<textarea style="vertical-align: top; min-width: 80%; height: 18em; word-wrap: break-word;" rows="4" cols="12" name="maintext" required></textarea><br>
                    　　　　　　　<input type="submit" value="投稿！" name="submit" style="position: absolute"><br>
                </p>
            </form>
        </div>
    </body>
    <footer>
        <link rel = "stylesheet" href = "style.css">
        <p ><a href="http:index.php" right: 220px>ホーム</a>に戻る</p>

        Copyright (c) 2019 404 NOT FOUND All Right Reserved.
    </footer>
</html>
