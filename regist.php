<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="regist.css">
    <title>アカウント登録フォーム</title>
    <!--JavaScriptの処理を追加 -->
        <script>
            function check(){
                var flag = 0;
                
                //設定開始（チェック項目の生成）
                if(document.form.familyN.value == ""){
                    const target = document.getElementById('target');
                    target.classList.add('fadeIn'); 
                    flag = 1;
                }
                 if(document.form.lastN.value == ""){
                    const target01 = document.getElementById('target01');
                    target01.classList.add('fadeIn'); 
                    flag = 1; 
                }
                if(document.form.familyNK.value == ""){
                    const target02 = document.getElementById('target02');
                    target02.classList.add('fadeIn'); 
                    flag = 1; 
                }
                if(document.form.lastNK.value == ""){
                    const target03 = document.getElementById('target03');
                    target03.classList.add('fadeIn'); 
                    flag = 1; 
                }
                if(document.form.mail.value == ""){
                    const target04 = document.getElementById('target04');
                    target04.classList.add('fadeIn'); 
                    flag = 1; 
                }
                if(document.form.pass.value == ""){
                    const target05 = document.getElementById('target05');
                    target05.classList.add('fadeIn'); 
                    flag = 1; 
                }
                if(document.form.poC.value == ""){
                    const target07 = document.getElementById('target07');
                    target07.classList.add('fadeIn'); 
                    flag = 1; 
                }
                if(document.form.prefecture.value==100){
                    const target08 = document.getElementById('target08');
                    target08.classList.add('fadeIn'); 
                    flag = 1; 
                }
                if(document.form.textAdd01.value == ""){
                    const target09 = document.getElementById('target09');
                    target09.classList.add('fadeIn'); 
                    flag = 1; 
                }
                if(document.form.textAdd02.value == ""){
                    const target10 = document.getElementById('target10');
                    target10.classList.add('fadeIn'); 
                    flag = 1; 
                }
            
                if(flag){
                    return false;//送信中止
                }else{
                    return true;//送信を実行
                }
            }
        </script>  
</head>
<body>
    <header>
        <div class="headerDiv">ナビゲーションバー</div>
    </header>
    <main>
        <form method="post" action="regist_confirm.php" name="form" onsubmit="return check();">
            <h1>
                アカウント登録画面
            </h1>
            <div>
                <label>名前（姓）</label>
                <input type="text" class="text" size="20" maxlength="10" name="familyN" id="FN" value="<?php if (!empty($_POST['FN'])) {
                    echo $_POST['FN'];
                }?>">
                <br>
                <p id="target" class="text alertText">名前(姓)を入力して下さい。</p>
            </div>

            <div>
                <label>名前（名）</label>
                <input type="text" class="text" size="20" maxlength="10" name="lastN" value="<?php if (!empty($_POST['LN'])) {
                    echo $_POST['LN'];
                }?>">
                <br>
                <p id="target01" class="text alertText">名前(名)を入力して下さい。</p>
            </div>
            <div>
                <label>カナ（姓）</label>
                <input type="text" class="text" size="20" maxlength="10" name="familyNK" value="<?php if (!empty($_POST['FNK'])) {
                    echo $_POST['FNK'];
                }?>">
                <br>
                <p id="target02" class="text alertText">名前(姓)をカタカナで入力して下さい。</p>
            </div>
            <div>
                <label>カナ（名）</label>
                <input type="text" class="text" size="20" maxlength="10" name="lastNK" value="<?php if (!empty($_POST['LNK'])) {
                    echo $_POST['LNK'];
                }?>">
                <br>
                <p id="target03" class="text alertText">名前(名)をカタカナで入力して下さい。</p>
            </div>
            <div>
                <label>メールアドレス</label>
                <input type="text" class="textMail" size="20" maxlength="100" name="mail" value="<?php if (!empty($_POST['MAIL'])) {
                    echo $_POST['MAIL'];
                }?>">
                <br>
                <p id="target04" class="text alertText">メールアドレスを入力して下さい。</p>
            </div>
            <div>
                <label>パスワード</label>
                <input type="password" class="text" size="20" maxlength="10" name="pass" value="<?php if (!empty($_POST['PASS'])) {
                    echo $_POST['PASS'];
                }?>">
                <br>
                <p id="target05" class="text alertText">パスワードを入力して下さい。</p>
            </div>
            <div>
                <label>性別</label>
                <input type="radio" name="gender" name="man" class="textGender" checked="checked" value="0"><p>男</p>
                <input type="radio" name="gender" name="woman" class="textGender" value="1" <?php if (!empty($_POST['GEN'])&& $_POST['GEN']==="1") {
                    echo'checked';
                } ?>><p>女</p>
                <br>
                <p id="target06" class="text alertText">性別を入力してください。</p>
            </div>
            <div>
                <label>郵便番号</label>
                <input type="text" class="textCode" size="8" maxlength="7" name="poC" value="<?php if (!empty($_POST['POC'])) {
                    echo $_POST['POC'];
                }?>">
                <br>
                <p id="target07" class="text alertText">郵便番号を入力して下さい。</p>
            </div>
            <div>
                <label>住所（都道府）</label>
                <select name="prefecture" class="textPrefecture" id="selectPre">
                    <option value="100">選択してください</option>
                    <script>
                        
                        function toOneDimention($previousValue,$currentValure){
                            return $previousValue.concat($currentValure)
                        }

                        var prefecture = [
                            ['北海道'],
                            ['青森県','秋田県','岩手県','山形県','宮城県','福島県'],
                            ['東京都','埼玉県','千葉県','茨城県','栃木県','群馬県','神奈川県'],
                            ['新潟県','富山県','石川県','福井県','長野県','岐阜県','山梨県','静岡県','愛知県'],
                            ['滋賀県','三重県','京都府','大阪府','奈良県','和歌山県','兵庫県'],
                            ['鳥取県','島根県','山口県','広島県','岡山県'],
                            ['愛媛県','香川県','徳島県','高知県'],
                            ['福岡県','大分県','佐賀県','熊本県','長崎県','宮城県','鹿児島県','沖縄県'],
                        ]

                        var prefectureNew = prefecture.reduce(toOneDimention);
                        for(var i = 0; i < prefectureNew.length; i++){
                            document.write( "<option value=" + prefectureNew[i] + ">"+ prefectureNew[i] + "</option>");
                        }

                    </script>
                </select>
                <br>
                <p id="target08" class="text alertText">都道府県を入力して下さい。</p>
            </div>
            <div>
                <label>住所（市区町村）</label>
                <input type="text" class="textAdd01" size="20" maxlength="10" name="textAdd01" value="<?php if (!empty($_POST['TA01'])) {
                    echo $_POST['TA01'];
                }?>">
                <br>
                <p id="target09" class="text alertText">住所（市区町村）を入力して下さい。</p>
            </div>
            <div>
                <label>住所（番地）</label>
                <input type="text" class="textAdd02" size="20" maxlength="100" name="textAdd02" value="<?php if (!empty($_POST['TA02'])) {
                    echo $_POST['TA02'];
                }?>">
                <br>
                <p id="target10" class="text alertText">住所（番地）入力して下さい。</p>
            </div>
            <div>
                <label>アカウント権限</label>
                <select name="textAuth" id="" class="textAuth">
                    <option value="0">  一般  </option>
                    <option value="1" <?php if(!empty($_POST['TA'])&&$_POST['TA']==="1"){
                        echo 'selected';
                        }?>>  管理者  </option>
                </select>
                <br>
                <br>
            </div>
            <div id="submitArea">
                <input type="submit" class="text" id="submit" size="10" name="XXX" value="確認する" onClick="return check();">
            </div>
        </form>
    </main>

    <footer>
        フッター
    </footer>
</body>
</html>