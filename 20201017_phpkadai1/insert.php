<?php

session_start();

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
// $name = $_POST['name'];
// $email =$_POST['email'];
// $naiyou =$_POST['naiyou'];
$Q1 = $_SESSION['Q1'];
$Q2 = $_SESSION['Q2'];
$Q3 = $_SESSION['Q3'];
$Q4 = $_SESSION['Q4'];
$Q5 = $_SESSION['Q5'];
$sex = $_SESSION['sex'];
$age = $_SESSION['age'];

//2. DB接続します
try {
  //ID MAMP ='root'
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_br_table(id, Q1, Q2, Q3, Q4, Q5, sex, age, indate)VALUES(NULL, :Q1, :Q2, :Q3, :Q4, :Q5, :sex, :age, sysdate())");
$stmt->bindValue(':Q1', $Q1, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Q2', $Q2, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Q3', $Q3, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Q4', $Q4, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Q5', $Q5, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age', $age, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header('Location: result.php');
  


}
?>
