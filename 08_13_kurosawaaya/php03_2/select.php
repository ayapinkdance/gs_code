<?php
include "funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view.='<tr>
        <td><a href="detail.php?id='.$result["id"].'">修正する</a></td>
        <td>'.$result["indate"].'</td>
        <td>'.$result["name"].'</td>
        <td>'.$result["lid"].'</td>
        <td>'.$result["lpw"].'</td>
        <td>'.$result["kanri_flg"].'</td>
        <td><a href="delete.php?id='.$result["id"].'">削除する</a></td>
    </tr>';
        // $view .= '<p>';
        // $view .= '<a href="detail.php?id='.$result["id"].'">';
        // $view .= $result["indate"] . "," . $result["name"] ;
        // $view .= '</a>';
        // $view.='　';
        // $view .= '<a href="delete.php?id='.$result["id"].'">';
        // $view .= '[削除]';
        // $view .= '</a>';
        // $view .= '</p>';
    }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <!-- <div class="container jumbotron"> -->
    <table border="1">
    <tr>
    <th></th>
    <th>日時</th>
    <th>名前</th>
    <th>ID</th>
    <th>パスワード</th>
    <th>属性</th>
    <th></th>
    </tr>
    <?php echo $view?></div>
   </table>
  
    <!-- </div> -->
</div>
<!-- Main[End] -->

</body>
</html>