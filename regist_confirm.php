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
    <link rel="stylesheet" href="update_confirm01.css">
    
    <title>アカウント登録確認フォーム</title>
</head>
<body>
    <header class="header">
        <div class="headerDiv">ナビゲーションバー</div>
    </header>
    <main class="main">
        <h1 class="mainH1">
            アカウント登録確認画面
        </h1>
        <table class="table">
            <tbody class="tbody">
                <tr class="tr">
                    <td class="td"><p>名前（姓)</p></td>
                    <td class="td tdRight"><?php echo $_POST['familyN'];?></td>
                </tr>
                <tr class="tr">
                    <td class="td"><p>名前（名）</p></p></td>
                    <td class="td tdRight"><?php echo $_POST['lastN'];?></td>
                </tr>
                <tr class="tr">
                    <td class="td"><p>カナ（姓）</p></td>
                    <td class="td tdRight"><?php echo $_POST['familyNK'];?> </td>
                </tr>
                <tr class="tr">
                    <td class="td"><p>カナ（名）</p></td>
                    <td class="td tdRight"><?php echo $_POST['lastNK'];?> </td>
                </tr>
                <tr class="tr">
                    <td class="td"><p>メールアドレス</p></td>
                    <td class="td tdRight"><?php echo $_POST['mail'];?> </td>
                </tr>
                <tr class="tr">
                    <td class="td"><p>パスワード</p></td>
                    <td class="td tdRight">
                        <?php echo $_POST['pass'];?>
                        <?php $passHash = password_hash($_POST['pass'],PASSWORD_DEFAULT);?>
                    </td>
                </tr>
                <tr class="tr">
                    <td class="td"><p>性別</p></td>
                    <td class="td tdRight"><?php echo SetGenderNmae($gender);?></td>
                </tr>
                <tr class="tr">
                    <td class="td"><p>郵便番号</p></td>
                    <td class="td tdRight"><?php echo $_POST['poC'];?></td>
                </tr>
                <tr class="tr">
                    <td class="td"><p>住所（都道府）</p></td>
                    <td class="td tdRight"><?php echo $_POST['prefecture'];?></td>
                </tr>
                <tr class="tr">
                    <td class="td"><p>住所（市区町村）</p></td>
                    <td class="td tdRight"><?php echo $_POST['textAdd01'];?></td>
                </tr>
                <tr class="tr">
                    <td class="td"><p>住所（番地） </p></td>
                    <td class="td tdRight"><?php echo $_POST['textAdd02'];?> </td>
                </tr>
                <tr class="tr">
                    <td class="td"><p>アカウント権限</p></td>
                    <td class="td tdRight"> <?php echo SettextAuthNmae($textAuth);?></td>
                </tr>
            </tbody>
        </table>
        <div id="button">
            <ul>
                <li>
                    <form action="regist.php" method="post" class="botton01" >
                        <input type="submit" class="botton01" value="戻って修正する。" id="submit">
                        <input type="hidden" value="<?php echo $_POST['familyN'];?>"name="FN">
                        <input type="hidden" value="<?php echo $_POST['lastN'];?>" name="LN">
                        <input type="hidden" value="<?php echo $_POST['familyNK'];?>" name="FNK">
                        <input type="hidden" value="<?php echo $_POST['lastNK'];?>" name="LNK">
                        <input type="hidden" value="<?php echo $_POST['mail'];?>" name="MAIL">
                        <input type="hidden" value="<?php echo $_POST['pass'];?>" name="PASS">
                        <input type="hidden" value="<?php echo $_POST['gender'];?>" name="GEN">
                        <input type="hidden" value="<?php echo $_POST['poC'];?>" name="POC">
                        <input type="hidden" value="<?php echo $_POST['prefecture'];?>" name="PRE">
                        <input type="hidden" value="<?php echo $_POST['textAdd01'];?>" name="TA01">
                        <input type="hidden" value="<?php echo $_POST['textAdd02'];?>" name="TA02">
                        <input type="hidden" value="<?php echo $_POST['textAuth'];?>" name="TA">
                    </form>
                </li>
                <li>
                    <form action="regist_complete.php" method="post" class="botton02">
                        <input type="submit" class="botton02" value="送信する。" id="submit"> 
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
                </li>
            </ul>
        </div>

    </main>
    <footer class="footer">
        フッター
    </footer>
</body>
</html>