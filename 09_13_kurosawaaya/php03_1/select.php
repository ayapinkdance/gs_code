<?php
session_start();
include "funcs.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
// $stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$head = "";
$view = "";

if($_SESSION["kanri_flg"]=="1"){
    $head = 
        '<tr>
        <th></th>
        <th>日時</th>
        <th>書籍名</th>
        <th>書籍URL<a href=""></a></th>
        <th>書籍画像</th>
        <th>コメント</th>
        <th></th>
        </tr>';
        // '<p>管理者ですよ</p>';
}else{
    $head = 
        '<tr>
        <th>日時</th>
        <th>書籍名</th>
        <th>書籍URL<a href=""></a></th>
        <th>書籍画像</th>
        <th>コメント</th>
        </tr>';
    // '<p>一般ユーザですよ</p>';
}


if ($status == false) {
    sqlError($stmt);
} else {
  // echo "\t<tr><th><tr><th>書籍名</th><th>書籍URL</th><th>書籍画像</th></tr>書籍画像</th></tr>\n";

    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // $view .= '<p>';
        // $view .= '<a href="detail.php?id='.$result["id"].'">';
        // $view .= "<tr><td>"$result["indate"] . "," . $result["bookname"].",".$result["bookURL"] .",".$result["img"].",".$result["naiyou"];
        // $view .= "<tr><td>".'<a href="detail.php?id='.$himoduke.'">'."編集する".'</a></td><td>'.$himoduke."</td><td>".$result["bookName"]."</td><td>".$result["bookURL"]."</td><td>".$result["bookComment"]."</td><td>".$result["readDate"]."</td><td>".$result["dateOfRegistration"]."</td><td>".'<a href="delete.php?id='.$himoduke.'">'."削除する"."</a></td></tr>";
        // $view .= '<tr><td>'.'<a href="detail.php?id='.$result["id"].'">'."修正する".'</a></td><td>'.$result["indate"].'</td><td>'.$result["bookname"].'</td><td>'.$result["bookURL"].'</td><td>'.$result["img"].'</td><td>'.$result["naiyou"].'</td><td>'.'<a href="delete.php?id='.$result["id"].'">'."削除する".'</a></td></tr>';
        // $view .= '<tr><td>'.'<a href="detail.php?id='.$result["id"].'">'."修正する".'</a></td><td>'.$result["indate"].'</td><td>'.$result["bookname"].'</td><td>.'<a href="'.$result["bookURL"].'">'</td><td>'.$result["img"].'</td><td>'.$result["naiyou"].'</td><td>'.'<a href="delete.php?id='.$result["id"].'">'."削除する".'</a></td></tr>';
        // $view .= '<p>'.$result["id"].'</p>';
        
        //下記プログラミングデータ
        // $view.='<tr>
        //             <td><a href="detail.php?id='.$result["id"].'">修正する</a></td>
        //             <td>'.$result["indate"].'</td>
        //             <td>'.$result["bookname"].'</td>
        //             <td><a href="'.$result["bookURL"].'">'.$result["bookURL"].'</a></td>
        //             <td><img src="'.$result["img"].'"></td>
        //             <td>'.$result["naiyou"].'</td>
        //             <td><a href="delete.php?id='.$result["id"].'">削除する</a></td>
        //         </tr>';
        $view.= '<p>';
        if($_SESSION["kanri_flg"]=="1"){
            $view.='<tr>
                    <td><a href="detail.php?id='.$result["id"].'">修正する</a></td>
                    <td>'.$result["indate"].'</td>
                    <td>'.$result["bookname"].'</td>
                    <td><a href="'.$result["bookURL"].'">'.$result["bookURL"].'</a></td>
                    <td><img src="'.$result["img"].'"></td>
                    <td>'.$result["naiyou"].'</td>
                    <td><a href="delete.php?id='.$result["id"].'">削除する</a></td>
                    </tr>';
        }   
        else{
            $view.='<tr>
                    <td>'.$result["bookname"].'</td>
                    <td><a href="'.$result["bookURL"].'">'.$result["bookURL"].'</a></td>
                    <td><img src="'.$result["img"].'"></td>
                    <td>'.$result["naiyou"].'</td>
                    </tr>';
        }
        // $view.= '</p>';
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
<style>div{padding: 10px;font-size:13px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="./bookmark/index.php">データ登録</a>
      <a class="navbar-brand" href="./kanri/logout.php">ログアウト</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <!-- <div class="container jumbotron"> -->
    <table border="1">
    <!-- <tr>
    <th></th>
    <th>日時</th>
    <th>書籍名</th>
    <th>書籍URL<a href=""></a></th>
    <th>書籍画像</th>
    <th>コメント</th>
    <th></th>
    </tr> -->
    <?php echo $head?>

    <?php echo $view?></div>
   </table>
   <!-- </div> -->
</div>
<!-- Main[End] -->

</body>
</html>