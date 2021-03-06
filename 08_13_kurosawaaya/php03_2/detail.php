<?php
$id=$_GET["id"];
// echo $id;
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
//以下Select.phpをコピーしてきました
include "funcs.php";
$pdo =db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(":id",$id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    $row=$stmt->fetch();
    // var_dump($row);
    }


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>更新</legend>
     <label>名前：<input type="text" name="name" value="<?php echo $row["name"];?>"></label><br>
     <label>ID：<input type="text" name="lid" value="<?php echo $row["lid"];?>"></label><br>
     <label>PW：<input type="text" name="lpw" value="<?php echo $row["lpw"];?>"></label><br>
     <!-- <label>年齢：<input type="text" name="age"></label><br> -->
     <!-- <label><textArea name="naiyou" rows="4" cols="40"><?php echo $row["naiyou"];?></textArea></label><br> -->
     <input type="hidden" name="id" value="<?php echo $id;?>"> 
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
