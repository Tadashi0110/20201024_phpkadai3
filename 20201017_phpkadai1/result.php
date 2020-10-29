<html lang="ja">

<?php
session_start();
?>

<head>
  <meta charset="utf-8">
　<title>診断結果</title> 
</head>
<body>
  <h2>診断結果</h2>
  <canvas id="myRaderChart"></canvas>
  <!-- CDN -->
　<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

<script type="text/javascript">
<!--
// var name = <!--?php json_encode($_SESSION['name']); ?-->;
// SESSIONを共有
var Q1 = <?php echo json_encode($_SESSION['Q1']); ?>;
var Q2 = <?php echo json_encode($_SESSION['Q2']); ?>;
var Q3 = <?php echo json_encode($_SESSION['Q3']); ?>;
var Q4 = <?php echo json_encode($_SESSION['Q4']); ?>;
var Q5 = <?php echo json_encode($_SESSION['Q5']); ?>;
-->

//グラフを作図 
    var ctx = document.getElementById("myRaderChart");
    var myRadarChart = new Chart(ctx, {
        type: 'radar', 
        data: { 
            labels: ["香り", "コク", "キレ", "のどごし", "味わい"],
            datasets: [{
                label: '評価',
                data: [Q1, Q2, Q3, Q4, Q5],
                backgroundColor: 'RGBA(225,95,150, 0.5)',
                borderColor: 'RGBA(225,95,150, 1)',
                borderWidth: 1,
                pointBackgroundColor: 'RGB(46,106,177)'
            }]
        },
        options: {
            title: {
                display: true,
                text: 'オススメビール'
            },
            scale:{
                ticks:{
                    suggestedMin: 0,
                    suggestedMax: 5,
                    stepSize: 1,
                    callback: function(value, index, values){
                        return  value +  'pt'
                    }
                }
            }
        }
    });
    
    
    // オススメ商品表示
 
    var total = parseInt(Q1) + parseInt(Q2) + parseInt(Q3) + parseInt(Q4) + parseInt(Q5) ;
    
    if (total <= 7){
        document.write(' <a href="https://www.amazon.co.jp/dp/B0069FI26O/ref=cm_sw_r_tw_dp_x_KZTJFbB0207X7"><img src="https://m.media-amazon.com/images/I/61AI645Y9fL._AC_UL320_.jpg" alt="title" width="200" height="200">買ってみる</a> ')
    } else if (total <= 10){
        document.write(' <a href="https://www.amazon.co.jp/dp/B0069FI6B0/ref=cm_sw_r_tw_dp_o0TJFbJ6H3XG4?_x_encoding=UTF8&psc=1 "><img src="https://m.media-amazon.com/images/I/7168kAW9T7L._AC_UL320_.jpg" alt="title" width="170" height="200">買ってみる</a> ') 
    } else if (total <= 15){
        document.write(' <a href="https://www.amazon.co.jp/dp/B07XTNL4H4/ref=cm_sw_r_tw_dp_2XTJFbDHSHKRY?_x_encoding=UTF8&psc=1 "><img src="https://m.media-amazon.com/images/I/61xGyY2vekL._AC_UL320_.jpg" alt="title" width="150" height="200">買ってみる</a>  ')
    } else if (total <= 21){
        document.write(' <a href="https://www.amazon.co.jp/dp/B00BN41NNA/ref=cm_sw_r_tw_dp_x_z1TJFb9FBKGF2"><img src="https://m.media-amazon.com/images/I/51765MbbZPL._AC_UL320_.jpg" alt="title" width="170" height="200">買ってみる</a>  ')
    } else if (total <= 25){
        document.write(' <a href="https://www.amazon.co.jp/dp/B008X22CMQ/ref=cm_sw_r_tw_dp_h2TJFb55Y2YE4?_x_encoding=UTF8&psc=1 "><img src="https://m.media-amazon.com/images/I/714v0UzZifL._AC_UL320_.jpg" alt="title" width="170" height="200">買ってみる</a>  ')
    }

    </script>
    
<a href="toppage.html">トップへ戻る</a>

</body>
</html>