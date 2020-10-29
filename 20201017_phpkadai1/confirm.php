<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>入力内容の確認ページ</title>
</head>
<body>
<?php

// Q1を表示する
  echo '<p> Q1：' . htmlspecialchars($_POST['Q1']) . '</p>';

// Q2を表示する
  echo '<p> Q2：' . htmlspecialchars($_POST['Q2']) . '</p>';

// Q3を表示する
  echo '<p> Q3：' . htmlspecialchars($_POST['Q3']) . '</p>';

// Q4を表示する
  echo '<p> Q4：' . htmlspecialchars($_POST['Q4']) . '</p>';

// Q5を表示する
  echo '<p> Q5：' . htmlspecialchars($_POST['Q5']) . '</p>';


// 性別を表示する
  $clean = array();

  if(isset($_POST['sex'])){ //チェックが0のときにエラーが出ないようにするif文
    switch ($_POST['sex']){
      case 'male':
      case 'female':
        $clean['sex'] = $_POST['sex'];
        break;
      default:
        /* エラー */
        $clean['sex'] = ' 不正なデータです ';
        break;
    }

    echo '<p> 性別：' . $clean['sex'] . '</p>';

  }

// 年齢を表示する
  switch ($_POST['age']){
    case '20+':
    case '30+':
    case '40+':
    case '50+':
    case '60+': 
      $clean['age'] = $_POST['age'];
      break;
    default:
      /* エラー */
      $clean['age'] = ' 入力し直してください ';
      break;
  }

  echo '<p> 年齢：' . $clean['age'] . '</p>';

//$_SESSION に入力データを保存する
$_SESSION['Q1'] = $_POST['Q1'];
$_SESSION['Q2'] = $_POST['Q2'];
$_SESSION['Q3'] = $_POST['Q3'];
$_SESSION['Q4'] = $_POST['Q4'];
$_SESSION['Q5'] = $_POST['Q5'];

if(isset($_POST['sex'])){ //チェックが0のときにエラーが出ないようにするif～else文
  $_SESSION['sex'] = $_POST['sex'];
} else {
  $_SESSION['sex'] = '';
}

$_SESSION['age'] = $_POST['age'];
?>

<p><b>この内容で診断してよろしいですか？</b></p>
<button onClick="history.back();">修正する</button>
<button onClick="location.href='insert.php'">診断する</button>

</body>
</html>