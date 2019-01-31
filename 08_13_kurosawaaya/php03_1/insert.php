<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$bookname=$_POST["bookname"];
$bookURL=$_POST["bookURL"];
$img=$_POST["img"];
$naiyou=$_POST["naiyou"];




//2. DB接続します
include("funcs.php");
$pdo=db_con();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(bookname,bookURL,img,naiyou,indate )VALUES(:bookname,:bookURL,:img,:naiyou,sysdate())");
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookURL', $bookURL, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':img', $img, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
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
