<?php

    session_start();
    //エラーメッセージ
    $err = [];

    //バリデーション
    if (!$email = filter_input(INPUT_POST,'email')) {
        $err['email'] = '<p style="color:red;">メールアドレスを入力して下さい</p>';
    }
    if (!$password = filter_input(INPUT_POST,'password')) {
        $err['password'] = '<p style="color:red;">パスワードを入力して下さい</p>';
    }

    if (count($err)>0) {
        //エラーがあった場合は戻す
        //$_SESSIONは連想配列でデータを格納する。値の入れ忘れ注意
        $_SESSION = $err;
        //※header()あとで調べる。
        header('Location:login.php');
        return;
    }

    class UserLogic{
        /**
         * @param string $email
         * @param string $password
         * @return bool $result
         */
        public static function login($email,$password){
            //結果
            $result = false;

            //ユーザーemailからとってきて取得
            $user = self::getUserByEmail($email);

            //emailが違っている時の処理
            if(!$user){
                $_SESSION['msg'] = '<p style="color:red;">メールアドレスが一致しません</p>';
                return false;
            }

            //パスワードの照会
            if(password_verify($password,$user['pasword'])){
                // セッションハイジャック対策
                session_regenerate_id(true);
                //ログイン成功
                $_SESSION['login_user'] = $user;
                $result = true;
                return $result;
            }
            
            //パスワードが違っているときの処理
            $_SESSION['msg'] = '<p style="color:red;">パスワードが一致しません</p>';
            return $result;
        }


        public static function getUserByEmail($email){
            /**
             * @param string $email
             * @return bool array|bool $user|false;
             */

            $dsn = "mysql:dbname=make_an_account;host=localhost;";
            $user = "root";
            $pass = "root";

            try{
                $dbh = new PDO($dsn,$user,$pass,[
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]);
                // sql文の格納
                $sql = 'SELECT * FROM makeAccount WHERE mail = "'.$email.'"';
                // sql文の実行
                $stmt = $dbh->query($sql);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                echo 'ログインID:';
                echo($user['id']);
                echo'<br>';
                echo 'メールアドレス:';
                echo($user['mail']);
                echo'<br>';
                echo '権限:';
                $authority = ($user['authority']);
                    if($authority === "0"){
                        echo"一般";
                    }else if ($authority === "1"){
                         echo"管理者";
                    }else{
                        echo'エラーです';
                   }
                echo'<br>';
                

                return $user;
            }catch(PDOException $e){
                echo'<p style="color:red;">エラーが発生した為ログインできません</p>'.$e->getMessage();
                return false;
            }
        }
    }
    
    //ログイン成功時の処理
    $result = UserLogic::login($email,$password);
    //ログイン失敗時の処理
    if(!$result){
        header('location: login.php');
        return;
    }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DIblog</title>
    <link rel="stylesheet" href="DIblog.css">
</head>
<body>
    <?php 
        if (count($err) > 0) {
            foreach($err as $e){
                echo "<p>$e</p>";
            }
        } else {
            echo"<p>ログイン完了致しました</p>";
        }
    ?>
    <img src="img/diblog_logo.jpg" alt="DIbloglogo">
    <header>
        <ul class="headerMenu">
            <li class="headerListTop">トップ</li>
            <li>プロフィール</li>
            <li>D.I blogについて</li>
            <!-- <li><a href="http://localhost/make_an_account/regist.php">登録フォーム </a> </li> -->
            <li><?php UserLogic::login($email,$password) ?></li>
            <li>お問合せ</li>
            <li><a href="http://localhost/make_an_account/list.php">アカウント一覧</a></li>
            <li>その他</li>
        </ul>
    </header>
    <main>
        <!-- メイン -->
        <div class="mainContainar">
            <h1 class="mainh1">
                プログラミングに役立つ書籍
            </h1>
            <p>
                2017年1月15日
            </p>
            <!-- メイン写真 -->
            <img src="img/bookstore.jpg" alt="book" class="bookstore" style="width: 100%; height: 400px;">
            <br>
            <p>
                D.I.BlogはD.I.Worksが提供する演習課題です。
            </p>
            <p>
                記事中身
            </p>
            <!-- 写真群 -->
            <div class="box2">
                <div class="boxPic2">
                    <img src="img/pic1.jpg" alt="">
                    <p>ドメインの取得</p>
                </div>
                <div class="boxPic2">
                    <img src="img/pic2.jpg" alt="">
                    <p>快適な職場環境</p>
                </div>
                <div class="boxPic2">
                    <img src="img/pic3.jpg" alt="">
                    <p>Linuxの基礎</p>
                </div>
                <div class="boxPic2">
                    <img src="img/pic4.jpg" alt="">
                    <p>マーケティングの入門</p>
                </div>
            </div>
            <div class="box2">
                <div class="boxPic2">
                    <img src="img/pic5.jpg" alt="">
                    <p>アクティブラーニング</p>
                </div>
                <div class="boxPic2">
                    <img src="img/pic6.jpg" alt="">
                    <p>CSSの効率的な勉強方法</p>
                </div>
                <div class="boxPic2">
                    <img src="img/pic7.jpg" alt="">
                    <p>リーダブルコード</p>
                </div>
                <div class="boxPic2">
                    <img src="img/pic8.jpg" alt="">
                    <p>HTMLの可能性</p>
                </div>
            </div>
        </div>
        <!-- サイドコンテナ -->
        <div class="asideContainar">
            <!-- 人気記事 -->
            <h2>人気の記事</h2>
            <ul>
                <li>PHPおすすめ本</li>
                <li>PHP My Adminの使い方</li>
                <li>今、人気のエディタTops</li>
                <li>HTMLの基礎</li>
            </ul>
            <!-- おすすめリンク -->
            <h2>おすすめリンク</h2>
            <ul>
                <li><a href="">ディーアイワークス株式会社</a></li>
                <li><a href=""></a>XAMPPのダウンロード</li>
                <li><a href=""></a>Eclipseのダウンロード</li>
                <li><a href=""></a>Braketsのダウンロード</li>
            </ul>
            <!-- カテゴリ -->
            <h2>カテゴリ</h2>
            <ul>
                <li>HTML</li>
                <li>PHP</li>
                <li>MySQL</li>
                <li>JavaScript</li>
            </ul>
        </div>
    </main>
    <footer>
        <!-- フッターコンテナ -->
        <div class="footerContainar">
            <!-- テキストボックス -->
            <div>
                Copyright D.I. blog is the which provides A to Z about programing
            </div>
        </div>
    </footer>
</body>
</html>