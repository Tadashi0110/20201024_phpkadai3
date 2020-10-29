<?php
require_once('funcs.php');
$id = $_GET["id"];

require_once('funcs.php');

$pdo = db_conn();
// sqlデータ削除
$stmt =$pdo->prepare('DELETE FROM gs_br_table WHERE id= :id');

$stmt->bindValue(':id', h($id), PDO::PARAM_INT);  

$status = $stmt->execute(); //実行
//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}

?>