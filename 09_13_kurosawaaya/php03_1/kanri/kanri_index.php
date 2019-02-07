<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<!-- <header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header> -->
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="kanri_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>新規ユーザー登録</legend>
     <label>氏名:<input type="text" name="name" ></label><br>
     <label>ID:<input type="text" name="lid" ></label><br>
     <label>PW:<input type="password" name="lpw"></label><br>
     <label>権限：
      <select name="kanri_flg">
      <option value="0">ユーザー</option>
      <option value="1">スーパー管理者</option>
      </select>
      <label><input type="hidden" name="life_flg" value="0"></label>
    </label>
     <input type="submit" value="会員登録">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
