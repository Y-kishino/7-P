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
    $textAuth = $_POST['authority'];

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
    <link rel="stylesheet" href="delete.css">
    <title>アカウント消去画面</title>
</head>
<body>
    <header>
        <div class="headerDiv">ナビゲーションバー</div>
    </header>
     <main class="main">
         <h1 class="mainH1">アカウント消去画面</h1>
        <form action="delete_confirm.php" method="post">
            <table class="table">
                <tbody class="tbody">
                    <tr class="tr">
                        <td class="td">名前(姓)</td>
                        <td class="td tdRight" ><?php echo $_POST['family_name'] ?></td>
                    </tr>
                    <tr class="tr">
                        <td class="td">名前(名)</td>
                        <td class="td tdRight" ><?php echo $_POST['last_name'] ?></td>
                    </tr>
                    <tr class="tr">
                        <td class="td">カナ(姓)</td>
                        <td class="td tdRight" ><?php echo $_POST['family_name_kana'] ?></td>
                    </tr>
                    <tr class="tr">
                        <td class="td">カナ(名)</td>
                        <td class="td tdRight" ><?php echo $_POST['last_name_kana'] ?></td>
                    </tr>
                    <tr class="tr">
                        <td class="td">メールアドレス</td>
                        <td class="td tdRight" ><?php echo $_POST['mail'] ?></td>
                    </tr>
                    <tr class="tr">
                        <td class="td">性別</td>
                        <td class="td tdRight" ><?php echo SetGenderNmae($gender)?></td>
                    </tr>
                    <tr class="tr">
                        <td class="td">郵便番号</td>
                        <td class="td tdRight" ><?php echo $_POST['postal_code'] ?></td>
                    </tr>
                    <tr class="tr">
                        <td class="td">住所(都道府県)</td>
                        <td class="td tdRight" ><?php echo $_POST['prefecture'] ?></td>
                    </tr>
                    <tr class="tr">
                        <td class="td">住所(市町村)</td>
                        <td class="td tdRight" ><?php echo $_POST['address_1'] ?></td>
                    </tr>
                    <tr class="tr">
                        <td class="td">住所(番地)</td>
                        <td class="td tdRight" ><?php echo $_POST['address_2'] ?></td>
                    </tr>
                    <tr class="tr">
                        <td class="td">アカウント権限</td>
                        <td class="td tdRight" ><?php echo SettextAuthNmae($textAuth) ?></td>
                    </tr>
                </tbody>
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
           </table> 
           <div id="submitArea">
            <input type="submit" class="text" id="submit" size="10" name="XXX" value="消去する">
        </div>
         </form>  
    </main>
</form> 
    <footer>
        <div class="footerDiv">フッター</div>
    </footer>
</body>
</html>