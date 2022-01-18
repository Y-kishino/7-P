<?php
if(!empty($_POST['PASS'])){
    $pasword = $_POST['PASS'];
}
?>
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
    $sql = "UPDATE makeAccount SET family_name='".$_POST['FN']."',
    last_name='".$_POST['LN']."',family_name_kana='".$_POST['FNK']."',
    last_name_kana='".$_POST['LNK']."',mail='".$_POST['MAIL']."',
    pasword='".$pasword."',gender='".$_POST['GEN']."',postal_code='".$_POST['POC']."',
    prefecture='".$_POST['PRE']."',address_1='".$_POST['TA01']."',
    address_2='".$_POST['TA02']."',authority='".$_POST['TA']."',
    update_time='".$time."' WHERE id='".$_POST['id']."'";
    // sql文の実行
    $dbh->query($sql);

    $dbh = null;
}catch(PDOException $e){
    echo'<h1 style="color:red;">エラーが発生した為アカウント登録できません</h1>'
    .$e->getMessage();
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