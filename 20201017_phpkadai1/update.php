<?php
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更
require_once('funcs.php');
//1. POSTデータ取得
$Q1 = $_POST["Q1"];
$Q2 = $_POST["Q2"];
$Q3 = $_POST["Q3"];
$Q4 = $_POST["Q4"];
$Q5 = $_POST["Q5"];
$Q6 = $_POST["Q6"];
$sex = $_POST["sex"];
$age = $_POST["age"];
$id    = $_POST["id"];

// echo $Q1;
// echo $Q2;
// echo $age;

//2. DB接続します
//*** function化する！  *****************
// ※returnを変数にちゃんと入れる！
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE
                            gs_br_table
                        SET
                            Q1 = :Q1,
                            Q2 = :Q2,
                            Q3 = :Q3,
                            Q4 = :Q4,
                            Q5 = :Q5,
                            sex = :sex,
                            age = :age,
                            indate = sysdate()
                        WHERE
                            id = :id;
                        ");
$stmt->bindValue(':Q1', h($Q1), PDO::PARAM_INT);  //h（）セキュリティ確保Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Q2', h($Q2), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Q3', h($Q3), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Q4', h($Q4), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':Q5', h($Q5), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':sex',h($sex), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':age',h($age), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', h($id), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行
//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}