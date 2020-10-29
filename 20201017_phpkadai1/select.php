<?php
session_start();

$Q1 = $_SESSION['Q1'];
$Q2 = $_SESSION['Q2'];
$Q3 = $_SESSION['Q3'];
$Q4 = $_SESSION['Q4'];
$Q5 = $_SESSION['Q5'];
$sex = $_SESSION['sex'];
$age = $_SESSION['age'];

require_once("funcs.php");
$pdo = db_conn();

//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError'.$e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_br_table');
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:" . $error[2]);
} else {
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $view .= '<p>';
    $view .= '<a href="detail.php?id=' . $result["id"] . '">';
    $view .= $result['indate'] . ' ' . $result['Q1'] . ' ' . $result['Q2'] . ' ' . $result['Q3'] . ' ' . $result['Q4'] . ' ' . $result['Q5'] . ' ' . $result['sex'] . ' ' . $result['age'];
    $view .= '</a>';
    $view .= '<a href="delete.php?id=' . $result["id"] . '">';
    $view .= '  /  [ 削除 ]';
    $view .= '</a>';
    $view .= '</p>';
  }
}
?>




<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ビール診断DB</title>
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
      <a class="navbar-brand" href="index2.php">データ登録へ戻る</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?></div>
</div>
<!-- Main[End] -->

</body>
</html>
