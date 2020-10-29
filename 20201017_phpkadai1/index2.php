<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>クラフトビール診断</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧を確認</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="confirm.php">

<!-- Q1 -->
<p> Q1 ビールのおつまみとして食べたいものは？<br>
    <input type="radio" name="Q1" value=1> 枝豆
    <input type="radio" name="Q1" value=2> ナッツ類
    <input type="radio" name="Q1" value=3> チーズ
    <input type="radio" name="Q1" value=4> 焼き鳥
    <input type="radio" name="Q1" value=5> から揚げ
</p>


<!-- Q2 -->
<p> Q2 いつもビールは何杯ぐらい飲みますか？<br>
    <input type="radio" name="Q2" value=1> 1杯
    <input type="radio" name="Q2" value=2> 2〜3杯
    <input type="radio" name="Q2" value=3> 4〜5杯
    <input type="radio" name="Q2" value=4> ５杯以上
    <input type="radio" name="Q2" value=5> 記憶がなくなるまで
</p>


<!-- Q3 -->
<p> Q3 ビールの次は何飲みたい？<br>
    <input type="radio" name="Q3" value=1> カクテル・サワー
    <input type="radio" name="Q3" value=2> ハイボール・ウィスキー
    <input type="radio" name="Q3" value=3> 日本酒・焼酎
    <input type="radio" name="Q3" value=4> 水
    <input type="radio" name="Q3" value=5> ずーっとビール
</p>

<!-- Q4 -->
<p> Q4 どんな時にビールを飲みたくなる？<br>
    <input type="radio" name="Q4" value=1> 仕事終わり
    <input type="radio" name="Q4" value=2> 自宅でくつろいでいるときに
    <input type="radio" name="Q4" value=3> お風呂上りに
    <input type="radio" name="Q4" value=4> 夕食時に
    <input type="radio" name="Q4" value=5> アウトドアで
</p>

<!-- Q5 -->
<p> Q5 ビールはどこで飲むことが多い？<br>
    <input type="radio" name="Q5" value=1> 居酒屋
    <input type="radio" name="Q5" value=2> 自宅
    <input type="radio" name="Q5" value=3> レストラン
    <input type="radio" name="Q5" value=4> バー
    <input type="radio" name="Q5" value=5> どこでも飲むよ
</p>

<!-- 性別 -->
<p> Q6 性別<br>
    <input type="radio" name="sex" value="male"> 男性
    <input type="radio" name="sex" value="female"> 女性
</p>

<!-- 年齢 -->
<p>Q7 年齢<br>
  <select name="age">
    <option value="20+">20～29歳</option>
    <option value="30+">30～39歳</option>
    <option value="40+">40～49歳</option>
    <option value="50+">50～59歳</option>
    <option value="60+">60歳以上</option>
  </select>
  </p>

  <p><input type="submit" value=" 確認 "></p>
  
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
