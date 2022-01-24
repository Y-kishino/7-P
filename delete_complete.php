<?php
mb_internal_encoding("UTF-8");
$dsn = "mysql:dbname=make_an_account;host=localhost;";
$user = "root";
$pass = "root";

try{
    $dbh = new PDO($dsn,$user,$pass,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    echo'Mysql接続成功';
         $time =  date('Y-m-d');
         echo $time;
    // sql文の格納
    $sql = "DELETE FROM makeAccount WHERE makeAccount.id = '".$_POST['id']."'";
    // sql文の実行
    $dbh->exec($sql);

    $dbh = null;
}catch(PDOException $e){
    echo'<h1 style="color:red;">エラーが発生した為アカウント消去できません</h1>';
    // .$e->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="delete_complete.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="headerDiv">ナビゲーションバー</div>
    </header>
    <main class="main">
        <h1 class="mainH1">
            アカウント消去完了画面
        </h1>
        <div class="deleteTextArea">
            <div class="deleteText" >
                消去完了いたしました
            </div>
        </div>
        <div id="button">
        <div class="submitArea">
            <div class="submit">
                <a href="DIblog.html">TOPページに戻る</a>
            </div>
        </div>
        </div>
    </main>
    <footer class="footer">
        <div>フッター</div>
    </footer>
</body>
</html>