<?php
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
$id = $_GET['id'];
// echo ($id);
//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
require_once("funcs.php");
$pdo = db_conn();
//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_br_table
                        WHERE id=" . $id);
$status = $stmt->execute();
//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}



?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>アカウント詳細</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">アカウント作成</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->
    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="detail.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->
    <!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
    <!-- Main[Start] -->
<!-- Main[Start] -->
<form method="POST" action="update.php">
    <div class="jumbotron">
    <fieldset>
    <legend>結果編集</legend>
    <p> Q1 ビールのおつまみとして食べたいものは？<br>
    <input type="radio" name="Q1" value=1 <?= $result["Q1"] == "1" ? ' checked' : ''?>> 枝豆
    <input type="radio" name="Q1" value=2 <?= $result["Q1"] == "2" ? ' checked' : ''?>> ナッツ類
    <input type="radio" name="Q1" value=3 <?= $result["Q1"] == "3" ? ' checked' : ''?>> チーズ
    <input type="radio" name="Q1" value=4 <?= $result["Q1"] == "4" ? ' checked' : ''?>> 焼き鳥
    <input type="radio" name="Q1" value=5 <?= $result["Q1"] == "5" ? ' checked' : ''?>> から揚げ
</p>


<!-- Q2 -->
<p> Q2 いつもビールは何杯ぐらい飲みますか？<br>
    <input type="radio" name="Q2" value=1 <?= $result["Q2"] == "1" ? ' checked' : ''?>> 1杯
    <input type="radio" name="Q2" value=2 <?= $result["Q2"] == "2" ? ' checked' : ''?>> 2〜3杯
    <input type="radio" name="Q2" value=3 <?= $result["Q2"] == "3" ? ' checked' : ''?>> 4〜5杯
    <input type="radio" name="Q2" value=4 <?= $result["Q2"] == "4" ? ' checked' : ''?>> ５杯以上
    <input type="radio" name="Q2" value=5 <?= $result["Q2"] == "5" ? ' checked' : ''?>> 記憶がなくなるまで
</p>


<!-- Q3 -->
<p> Q3 ビールの次は何飲みたい？<br>
    <input type="radio" name="Q3" value=1 <?= $result["Q3"] == "1" ? ' checked' : ''?>> カクテル・サワー
    <input type="radio" name="Q3" value=2 <?= $result["Q3"] == "2" ? ' checked' : ''?>> ハイボール・ウィスキー
    <input type="radio" name="Q3" value=3 <?= $result["Q3"] == "3" ? ' checked' : ''?>> 日本酒・焼酎
    <input type="radio" name="Q3" value=4 <?= $result["Q3"] == "4" ? ' checked' : ''?>> 水
    <input type="radio" name="Q3" value=5 <?= $result["Q3"] == "5" ? ' checked' : ''?>> ずーっとビール
</p>

<!-- Q4 -->
<p> Q4 どんな時にビールを飲みたくなる？<br>
    <input type="radio" name="Q4" value=1 <?= $result["Q4"] == "1" ? ' checked' : ''?>> 仕事終わり
    <input type="radio" name="Q4" value=2 <?= $result["Q4"] == "2" ? ' checked' : ''?>> 自宅でくつろいでいるときに
    <input type="radio" name="Q4" value=3 <?= $result["Q4"] == "3" ? ' checked' : ''?>> お風呂上りに
    <input type="radio" name="Q4" value=4 <?= $result["Q4"] == "4" ? ' checked' : ''?>> 夕食時に
    <input type="radio" name="Q4" value=5 <?= $result["Q4"] == "5" ? ' checked' : ''?>> アウトドアで
</p>

<!-- Q5 -->
<p> Q5 ビールはどこで飲むことが多い？<br>
    <input type="radio" name="Q5" value=1 <?= $result["Q5"] == "1" ? ' checked' : ''?>> 居酒屋
    <input type="radio" name="Q5" value=2 <?= $result["Q5"] == "2" ? ' checked' : ''?>> 自宅
    <input type="radio" name="Q5" value=3 <?= $result["Q5"] == "3" ? ' checked' : ''?>> レストラン
    <input type="radio" name="Q5" value=4 <?= $result["Q5"] == "4" ? ' checked' : ''?>> バー
    <input type="radio" name="Q5" value=5 <?= $result["Q5"] == "5" ? ' checked' : ''?>> どこでも飲むよ
</p>

<!-- 性別 -->
<p> Q6 性別<br>
    <input type="radio" name="sex" value="male"<?= $result["sex"] == "male" ? ' checked' : ''?>> 男性
    <input type="radio" name="sex" value="female"<?= $result["sex"] == "female" ? ' checked' : ''?>> 女性
</p>

<!-- 年齢 -->
<p>Q7 年齢<br>
  <select name="age">
    <option value="20+"<?php echo array_key_exists('age', $result) && $result['age'] == '20+' ? 'selected' : ''; ?>>20～29歳</option>
    <option value="30+"<?php echo array_key_exists('age', $result) && $result['age'] == '30+' ? 'selected' : ''; ?>>30～39歳</option>
    <option value="40+"<?php echo array_key_exists('age', $result) && $result['age'] == '40+' ? 'selected' : ''; ?>>40～49歳</option>
    <option value="50+"<?php echo array_key_exists('age', $result) && $result['age'] == '50+' ? 'selected' : ''; ?>>50～59歳</option>
    <option value="60+"<?php echo array_key_exists('age', $result) && $result['age'] == '60+' ? 'selected' : ''; ?>>60歳以上</option>
  </select>
  </p>

                <input type="hidden" name="id" value=<?= $result['id'] ?>>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->
</body>
</html>





