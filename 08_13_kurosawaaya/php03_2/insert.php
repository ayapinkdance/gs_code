<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$name=$_POST["name"];
$lid=$_POST["lid"];
$lpw=$_POST["lpw"];
$kanri_flg = $_POST["kanri_flg"];

// $id = $_POST["id"];


//2. DB接続します
include("funcs.php");
$pdo=db_con();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(name,lid,lpw,kanri_flg,indate)VALUES(:name,:lid,:lpw,:kanri_flg,sysdate())");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sqlError($stmt);
}else{
  //５．index.phpへリダイレクト
  redirect("index.php");

}
?>
