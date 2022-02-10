<?php
    //セッション開始
    session_start();
    $err = $_SESSION;

    //セッションを消す
    $_SESSION = array();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>ログイン画面</title>
</head>
<body>
<header>
        <div class="headerDiv">ナビゲーションバー</div>
    </header>
    <main>
        <h1>
            ログイン画面
        </h1>
        <form action="DIblog.php" method="POST">
            <div class="mainDiv">
                
                <p>
                    <label for="email">メールアドレス　:　</label>
                    <input type="email" name="email" placeholder="">
                    <br>
                    
                </p>

                <p>
                    <label for="password">パスワード　　　:　</label>
                    <input type="password" name="password" placeholder="">
                    <br>
                    
                </p> 
                <?php
                        if (isset($err['email'])) {
                            echo $err['email'];
                        }
                    ?>
                <?php
                        if (isset($err['password'])) {
                            echo $err['password'];
                        }
                    ?>
                <?php
                    if (isset($err['msg'])) {
                        echo $err['msg'];
                    }
                ?>
            </div>
            <div class="submitArea">
                <div class="submit">
                    <a href="DIblog.html"><input type="submit" value="ログイン" class="submit"></a>
                </div>
            </div>
        </form>

    </main>
    <footer> 
    フッター
    </footer>
</body>
</html>