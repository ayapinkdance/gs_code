<?php

//---------------------------------------
// Insert.phpからコピーしてきた
//---------------------------------------

$name=$_POST["name"];
$lid=$_POST["lid"];
$lpw=$_POST["lpw"];
$id = $_POST["id"];
$kanri_flg = $_POST["kanri_flg"];


//2. DB接続します
include "funcs.php"; //include ("funcs.php");

$pdo = db_con();

//３．データ登録SQL作成
$sql = "UPDATE gs_user_table SET name=:name,lid=:lid, lpw=:lpw WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

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
