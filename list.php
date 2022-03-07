<?php
    session_start();
    require_once'./function.php';
 ?>
 <!-- DB接続 -->
<?php

    mb_internal_encoding("UTF-8");
    $dsn = "mysql:dbname=make_an_account;host=localhost";
    $user = "root";
    $pass = "root";
    try{
        $dbh = new PDO($dsn,$user,$pass,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
        echo'接続成功';
        //sql文の格納
        $sql = 'SELECT * FROM makeAccount ORDER BY id DESC';
        $stmt = $dbh->query($sql);
        //sql文の結果の取り出し
        $table = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // FETCH_ASSOC
        
        // var_dump($table);
        
        $dbh = null;
    }catch(PDOException $e){
        echo'接続失敗'.$e->getMessage();
        exit();
    }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="list00.css">
    <title>アカウント検索画面</title>
</head>
<body>
    <header class="header">
        <div class="headerDiv">ナビゲーションバー</div>
    </header>
    <main class="main" style="height: fit-content;">




        <h4 class="mainH1">アカウント検索</h4>
        <form action="list.php" method="POST" class="searchArea">
            <table class="table" border="1">
                <tr>
                    <td width="15%" align="center">名前（姓）</td>
                    <td width="35%">
                        <input type="text"  class="inputText" value="" name="familyName">
                    </td>
                    <td width="15%" align="center">名前（名）</td>
                    <td width="35%">
                        <input type="text"  class="inputText" value="" name="lastName">
                    </td>
                </tr>
                <tr>
                    <td width="15%" align="center">カナ（姓）</td>
                    <td width="35%">
                        <input type="text"  class="inputText" value="" name="familyNameKana"> 
                    </td>
                    <td width="15%" align="center">カナ（名）</td>
                    <td width="35%">
                        <input type="text"  class="inputText" value="" name="lastNameKana">
                    </td>
                </tr>
                <tr>
                    <td width="15%" align="center">メールアドレス</td>
                    <td width="35%">
                        <input type="text"  class="inputText" value="" name="mail"> 
                    </td>
                    <td width="15%" align="center">性別</td>
                    <td width="35%" class="serachGender">
                        <input type="radio" name="gender" value="" checked><p>なし</p>
                        <input type="radio" name="gender" value="0"><p>男</p>
                        <input type="radio" name="gender" value="1"><p>女</p>
                    </td>
                </tr>
                <tr>
                    <td width="15%" align="center">アカウント権限</td>
                    <td width="35%">
                        <select name="textAuth" id="" class="inputText">
                            <option value="">設定しない</option>
                            <option value="0">  一般  </option>
                            <option value="1">  管理者  </option>
                        </select>
                    </td>
                    <td colspan="2"></td>
                </tr>
            </table>
            <div class="submitArea">
                <input type="submit" value="検索" class="serachSubmit" style="width: 200px;">
            </div>
        </form>
        <?php 
            //DB再接続
            if (isset($_POST['familyName'])||isset($_POST['lastNname'])) {
                mb_internal_encoding("UTF-8");
                $dsn = "mysql:dbname=make_an_account;host=localhost";
                $user = "root";
                $pass = "root";
                try{
                    $dbh = new PDO($dsn,$user,$pass,[
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    ]);
                    echo'接続成功';
                    //sql文の格納
                    $sql = "SELECT * FROM makeAccount WHERE family_name LIKE'%".$_POST['familyName']."%' 
                    AND last_name LIKE'%".$_POST['lastName']."%' AND family_name_kana LIKE'%".$_POST['familyNameKana']."%' 
                    AND last_name_kana LIKE'%".$_POST['lastNameKana']."%' AND mail LIKE'%".$_POST['mail']."%' 
                    AND gender LIKE'%".$_POST['gender']."%' AND authority LIKE'%".$_POST['textAuth']."%' ORDER BY id DESC";
                    $stmt = $dbh->query($sql);
                    //sql文の結果の取り出し
                    $table = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                    $dbh = null;
                }catch(PDOException $e){
                    echo'接続失敗'.$e->getMessage();
                    exit();
                }
            }
        ?>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th width="40"> ID </th>
                    <th>名前(姓)</th>
                    <th>名前(姓)</th>
                    <th>カナ（姓）</th>
                    <th>カナ（名）</th>
                    <th>メールアドレス</th>
                    <th width="50">性別</th>
                    <th>アカウント権限</th>
                    <th>削除フラグ</th>
                    <th>登録日時</th>
                    <th>更新日時</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 foreach($table as $column){
                 ?>
                <tr class="tr">
                    <td align="center">
                        <?php echo($column['id'])?>
                    </td>
                    <td align="center">
                        <?php echo($column['family_name'])?>
                    </td>
                    <td align="center">
                        <?php echo($column['last_name'])?>
                    </td>
                    <td align="center">
                        <?php echo($column['family_name_kana'])?>
                    </td>
                    <td align="center">
                        <?php echo($column['last_name_kana'])?>
                    </td>
                    <td align="center">
                        <?php echo($column['mail'])?>
                    </td>
                    <td align="center">
                        <?php 
                            $gender = ($column['gender']);
                                if($gender === '0'){
                                    echo '男';
                                } else if($gender === '1'){
                                    echo'女';
                                } else {
                                    echo'エラーです';
                                }
                        ?> 
                    </td>
                    <td align="center">
                        <?php 
                            $authority = ($column['authority']);
                                if($authority === "0"){
                                    echo"一般";
                                }else if ($authority === "1"){
                                    echo"管理者";
                                }else{
                                    echo'エラーです';
                                }
                        ?>
                    </td>
                    <td align="center" class="deleteFlag">
                    <?php 
                            $deleteFlag = ($column['delete_flag']);
                             if($deleteFlag === "1"){
                                 echo"無効";
                             }else if ($deleteFlag ==="0"){
                                 echo"有効";
                             }else{
                                 echo"エラーです";
                             }
                        ?>
                    </td>
                    <td align="center">
                        <?php echo($column['registered_time'])?>
                    </td>
                    <td align="center">
                        <?php echo($column['update_time'])?>
                    </td>
                    <td>
                        <ul class="ul">
                            <li class="list">
                                <form class="form" action="update.php" method="post">
                                    <input class="submit jssubmit" type="submit" value="更新">
                                    <input type="hidden" value="<?php echo ($column['family_name'])?>" name="FN">
                                    <input type="hidden" value="<?php echo ($column['last_name'])?>" name="LN">
                                    <input type="hidden" value="<?php echo ($column['family_name_kana'])?>" name="FNK">
                                    <input type="hidden" value="<?php echo ($column['last_name_kana'])?>" name="LNK">
                                    <input type="hidden" value="<?php echo ($column['mail'])?>" name="MAIL">
                                    <input type="hidden" value="<?php echo $gender;?>" name="GEN">
                                    <input type="hidden" value="<?php echo ($column['postal_code'])?>" name="POC">
                                    <input type="hidden" value="<?php echo ($column['prefecture'])?>" name="PRE">
                                    <input type="hidden" value="<?php echo ($column['address_1'])?>" name="TA01">
                                    <input type="hidden" value="<?php echo ($column['address_2'])?>" name="TA02">
                                    <input type="hidden" value="<?php echo $authority ?>" name="TA">
                                    <input type="hidden" value="<?php echo ($column['update_time'])?>" name="UPT">
                                    <input type="hidden" value="<?php echo($column['id'])?>" name="id">
                                </form>
                            </li>
                            <li class="list">
                                <form class="form" action="delete.php" method="post">
                                    <input class="submit jssubmit01" type="submit" value="削除">
                                    <input type="hidden" value="<?php echo ($column['id'])?>" name="id">
                                    <input type="hidden" value="<?php echo ($column['family_name'])?>" name="family_name">
                                    <input type="hidden" value="<?php echo ($column['last_name'])?>" name="last_name">
                                    <input type="hidden" value="<?php echo ($column['family_name_kana'])?>" name="family_name_kana">
                                    <input type="hidden" value="<?php echo ($column['last_name_kana'])?>" name="last_name_kana">
                                    <input type="hidden" value="<?php echo ($column['mail'])?>" name="mail">
                                    <input type="hidden" value="<?php echo ($column['pasword'])?>" name="pasword">
                                    <input type="hidden" value="<?php echo ($column['gender'])?>" name="gender">
                                    <input type="hidden" value="<?php echo ($column['postal_code'])?>" name="postal_code">
                                    <input type="hidden" value="<?php echo ($column['prefecture'])?>" name="prefecture">
                                    <input type="hidden" value="<?php echo ($column['address_1'])?>" name="address_1">
                                    <input type="hidden" value="<?php echo ($column['address_2'])?>" name="address_2">
                                    <input type="hidden" value="<?php echo ($column['authority'])?>" name="authority">
                                    <input type="hidden" value="<?php echo ($column['delete_flag'])?>" name="delete_flag">
                                    <input type="hidden" value="<?php echo ($column['registered_time'])?>" name="registered_time">
                                    <input type="hidden" value="<?php echo ($column['update_time'])?>" name="update_time">
                                </form>
                            </li>
                        </ul>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <script>
        const updateButtonLists = document.querySelectorAll("input.submit.jssubmit");
        const deleteButtonLists = document.querySelectorAll("input.submit.jssubmit01");
        const deleteFlag = document.querySelectorAll("td.deleteFlag");
        let lists = [];
        let lists01 = [];
        updateButtonLists.forEach(list => {
            lists.push(list);
        }) 
        deleteButtonLists.forEach(list01 =>{
            lists01.push(list01)
        })
        for (let index = 0; index < lists.length; index++) {
            lists[index].addEventListener("click",(e)=>{
                if (deleteFlag[index].innerText=="無効") {
                    window.alert("削除フラグが無効の為、更新できません");
                    e.preventDefault();
                }   
            })
        }
        for (let index = 0; index < lists01.length; index++) {
            lists01[index].addEventListener("click",(e)=>{
                if (deleteFlag[index].innerText=="無効") {
                    window.alert("削除フラグが無効の為、削除できません");
                    e.preventDefault();
                }   
            })
        }
        </script>

    </main>
    <footer class="footer">
        フッター
    </footer>
    
</body>
</html>


<!-- SELECT id,family_name,last_name,family_name_kana,last_name_kana,mail,gender,postal_code,prefecture,
address_1,address_2,authority,delete_flag,registered_time,update_time FROM makeAccount; -->

<!-- if(deleteFlag===1){
                    window.alert("削除フラグ無効の為編集できません。")
                    flag = 1; 
                }

                if(flag){
                    return false;//送信中止
                }else{
                    return true;//送信を実行
                } -->