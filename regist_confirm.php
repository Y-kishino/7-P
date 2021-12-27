<?php
    $gender = $_POST['gender'];

    function SetGenderNmae($gender){
        if($gender === '0'){
            return'男';
        } else if($gender === '1'){
            return'女';
        } else {
            return;
        }
    }
?>
<?php
    $textAuth = $_POST['textAuth'];

    function SettextAuthNmae($textAuth){
        if($textAuth === '0'){
            return'一般';
        } else {
            return'管理者';
        }
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="regist_confirm.css">
    <title>アカウント登録確認フォーム</title>
</head>
<body>
    <header>
        <div class="headerDiv">ナビゲーションバー</div>
    </header>
    <main>
        <h1>
            アカウント登録確認画面
        </h1>
        <div>
            <p>名前（姓）
            <?php echo $_POST['familyN'];?>
            </p>
        </div>

        <div>
            <p>名前（名）
            <?php echo $_POST['lastN'];?>
            </p>
        </div>
        <div>
            <p>カナ（姓）
            <?php echo $_POST['familyNK'];?>
            </p>
            
        </div>
        <div>
            <p>カナ（名）
            <?php echo $_POST['lastNK'];?>
            </p>
            
        </div>
        <div>
            <p>メールアドレス
            <?php echo $_POST['mail'];?>
            </p>
            
        </div>
        <div>
            <p>パスワード
            <?php echo $_POST['pass'];?>
            <?php $passHash = password_hash($_POST['pass'],PASSWORD_DEFAULT);?>
            </p>
            
        </div>
        <div id="textgender">
            <p>性別
            <?php echo SetGenderNmae($gender);?>
            </p>
            
        </div>
        <div>
            <p>郵便番号
            <?php echo $_POST['poC'];?>
            </p>
            
        </div>
        <div>
            <p>住所（都道府）
            <?php echo $_POST['prefecture'];?>
            </p>
            
        </div>
        <div>
            <p>住所（市区町村）
            <?php echo $_POST['textAdd01'];?>
            </p>
            
        </div>
        <div>
            <p>住所（番地）
            <?php echo $_POST['textAdd02'];?>
            </p>
        </div>
        <div>
            <p>アカウント権限
            <?php echo SettextAuthNmae($textAuth);?>
            </p>
            
        </div>

        <div>
            <form action="regist.html" class="botton01" style="width: 100px;" style="height: 50px;" style="padding-right: 100px;" >
                <input type="submit" class="botton01" value="戻って修正する。">
            </form>
            <form action="regist_complete.php" method="post" class="botton02" style="width: 40px;" style="height:50px;">
                <input type="submit" class="botton02" value="送信する。" > 
                <input type="hidden" value="<?php echo $_POST['familyN'];?>"name="FN">
                <input type="hidden" value="<?php echo $_POST['lastN'];?>" name="LN">
                <input type="hidden" value="<?php echo $_POST['familyNK'];?>" name="FNK">
                <input type="hidden" value="<?php echo $_POST['lastNK'];?>" name="LNK">
                <input type="hidden" value="<?php echo $_POST['mail'];?>" name="MAIL">
                <input type="hidden" value="<?php echo $passHash;?>" name="PASS">
                <input type="hidden" value="<?php echo $_POST['gender'];?>" name="GEN">
                <input type="hidden" value="<?php echo $_POST['poC'];?>" name="POC">
                <input type="hidden" value="<?php echo $_POST['prefecture'];?>" name="PRE">
                <input type="hidden" value="<?php echo $_POST['textAdd01'];?>" name="TA01">
                <input type="hidden" value="<?php echo $_POST['textAdd02'];?>" name="TA02">
                <input type="hidden" value="<?php echo $_POST['textAuth'];?>" name="TA">
            </form>
        </div>

    </main>
    <footer>
        フッター
    </footer>
</body>
</html>