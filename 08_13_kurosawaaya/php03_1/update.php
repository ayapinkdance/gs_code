<?php

//---------------------------------------
// Insert.phpからコピーしてきた
//---------------------------------------
$bookname   = $_POST["bookname"];
$bookURL  = $_POST["bookURL"];
$naiyou = $_POST["naiyou"];
$img = $_POST["img"];
$id     = $_POST["id"];

//2. DB接続します
include "funcs.php"; //include ("funcs.php");

$pdo = db_con();

//３．データ登録SQL作成
$sql = "UPDATE gs_bm_table SET bookname=:bookname,bookURL=:bookURL,img=:img, naiyou=:naiyou WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookURL', $bookURL, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':img', $img, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

// ４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: select.php");
    exit;
}
//1.POSTでParamを取得


//2.DB接続など


//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。




?>
