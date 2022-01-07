

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
         $time =  date('Y-m-d H:i:s');
         echo $time;
    // sql文の格納
    $sql = "insert into makeAccount(id,family_name,last_name,family_name_kana,last_name_kana,
    mail,pasword,gender,postal_code,prefecture,address_1,address_2,
    authority,delete_flag,registered_time,update_time)values
    (null,'".$_POST['FN']."','".$_POST['LN']."','".$_POST['FNK']."','".$_POST['LNK']."','".$_POST['MAIL']."',
    '".$_POST['PASS']."','".$_POST['GEN']."','".$_POST['POC']."','".$_POST['PRE']."','".$_POST['TA01']."',
    '".$_POST['TA02']."','".$_POST['TA']."',1,'".$time."','".$time."')";
    // sql文の実行
    $dbh->exec($sql);

    $dbh = null;
}catch(PDOException $e){
    echo'<h1 style="color:red;">エラーが発生した為アカウント登録できません</h1>';
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
    <link rel="stylesheet" href="regist_complete.css">
    <title>アカウント登録確認完了フォーム</title>
</head>
<body>
    <header>
        <div class="headerDiv">ナビゲーションバー</div>
    </header>
    <main>
        <h1>
            アカウント登録完了画面
        </h1>
        <div class="mainDiv">
            <p class="text01">登録完了しました。</p>
        </div>
        <div class="submitArea">
            <div class="submit">
                <a href="DIblog.html">TOPページに戻る</a>
            </div>
        </div>
    </main>
    <footer> 
    フッター
    </footer>
    <?php
        // $time =  date("Y/m/d H:i:s");
        // echo $time;
    ?> 
</body>
</html>