<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="delete_confirm.css">
    <title>アカウント消去確認画面</title>
</head>
<body>
    <header class="header">
        <div class="headerDiv">
            ナビゲーションバー
        </div>
    </header>
    <main class="main">
        <h1 class="mainH1">
            アカウント消去確認画面
        </h1>
        <div class="deleteTextArea">
            <div class="deleteText" >
                本当に消去してもよろしいですか？
            </div>
        </div>
        <div id="button">
            <ul>
                <li>
                    <form action="delete_complete.php" method="post">
                        <div id="submitArea">
                            <input type="submit" class="text" id="submit" size="10" name="XXX" value="消去する">
                            <input type="hidden" value="<?php echo $_POST['id']?>" name="id">
                        </div>
                    </form>
                </li>
                <li>
                    <form action="delete.php" method="post">
                        <div id="submitArea">
                            <input type="submit" class="text" id="submit" size="10" name="XXX" value="前に戻る">
                            <input type="hidden" value="<?php echo $_POST['id']?>" name="id">
                            <input type="hidden" value="<?php echo $_POST['family_name']?>" name="family_name">
                            <input type="hidden" value="<?php echo $_POST['last_name']?>" name="last_name">
                            <input type="hidden" value="<?php echo $_POST['family_name_kana']?>" name="family_name_kana">
                            <input type="hidden" value="<?php echo $_POST['last_name_kana']?>" name="last_name_kana">
                            <input type="hidden" value="<?php echo $_POST['mail']?>" name="mail">
                            <input type="hidden" value="<?php echo $_POST['pasword']?>" name="pasword">
                            <input type="hidden" value="<?php echo $_POST['gender']?>" name="gender">
                            <input type="hidden" value="<?php echo $_POST['postal_code']?>" name="postal_code">
                            <input type="hidden" value="<?php echo $_POST['prefecture']?>" name="prefecture">
                            <input type="hidden" value="<?php echo $_POST['address_1']?>" name="address_1">
                            <input type="hidden" value="<?php echo $_POST['address_2']?>" name="address_2">
                            <input type="hidden" value="<?php echo $_POST['authority']?>" name="authority">
                            <input type="hidden" value="<?php echo $_POST['delete_flag']?>" name="delete_flag">
                            <input type="hidden" value="<?php echo $_POST['registered_time']?>" name="registered_time">
                            <input type="hidden" value="<?php echo $_POST['update_time']?>" name="update_time">
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </main>
    <footer>
        <div class="footerDiv">
            フッター
        </div>
    </footer>
</body>
</html>