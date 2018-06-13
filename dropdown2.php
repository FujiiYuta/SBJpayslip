<!-- 給与明細フライングシステム
2018.02.06
Yuta Fujii -->
<!-- phpで作る版 -->
<?php
//エラー文の表示
// ini_set("display_errors", 1);
// error_reporting(E_ALL);
$calDate = $_POST['calDate'];
if(!isset($calDate)){
$calDate = time();
}
    if(isset($_POST["before"])){
    
    //strtotime(第一引数,第二引数)は第二引数を基準として第一引数の分相対的にタイムスタンプを出力
    $calDate = strtotime('-1 month', $calDate);
}
 if(isset($_POST["after"])){
    
    $calDate = strtotime('+1 month', $calDate);    
}


    //date(第一引数, 第二引数)は第二引数の時間を第一引数で指定したフォーマット(月とか年とか日とか分とか)で出力できる
    $Year = date('Y', $calDate);
    $Month = date('n', $calDate);
    






    $CAL = set_calender($Year, $Month);
    

function set_calender($year, $month){
// 月末日を取得
//0は前月の末尾という意味
$last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));
 
$calendar = array();
$j = 0;
 
// 月末日までループ
for ($i = 1; $i < $last_day + 1; $i++) {
 
    // 曜日を取得
    $week = date('w', mktime(0, 0, 0, $month, $i, $year));
 
    // 1日の場合
    if ($i == 1) {
 
        // 1日目の曜日までをループ
        for ($s = 1; $s <= $week; $s++) {
 
            // 前半に空文字をセット
            $calendar[$j]['day'] = '';
            $j++;
 
        }
 
    }
 
    // 配列に日付をセット
    $calendar[$j]['day'] = $i;
    $j++;
 
    // 月末日の場合
    if ($i == $last_day) {
 
        // 月末日から残りをループ
        for ($e = 1; $e <= 6 - $week; $e++) {
 
            // 後半に空文字をセット
            $calendar[$j]['day'] = '';
            $j++;
 
        }
 
    }
 
}
return $calendar;
}


 
?>


<html lang="ja">
    <head>
        <meta charset="UTF-8">

        <title>Frying Payslip</title>
        <script src="http://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
          <script> 
          //日付のボタンの動作を司る部分
        $(function(){
  $(".menu").on("click", function(){
    if ($(this).next().css("display") == "none"){
      $(this).next().slideDown();
    } else {
      $(this).next().slideUp();
    }
  });
});
          </script>
          <script type="text/javascript">
          //ここはなに？
          function send(){
              document.form1.submit();
              document.form2.submit();
          }
          </script>
        <style type="text/css">
table {
    width: 100%;
}
table th {
    background: #EEEEEE;
}
table th,
table td {
    border: 1px solid #CCCCCC;
    text-align: center;
    padding: 5px;
    height: 80px;
}
.migi{
    float: right;
}
.hidari{
    float:left;
}
.dakoku{
    display: none;
    /* width:100%; */
}
.menu{
    width:100%;
    height:100%;
}
.output_b{
    background-color: #54d132;
    width: 500px;
    height: 80px;
}
.mannaka{
    text-align: center;
}
#glay{
    background-color:#bbb;
}
#red{
    background-color:#d77;
}
#blue{
    background-color:#77d;
}
</style>
    </head>
 
    <body><div>
    <h1 class="mannaka">Flying Payslip</h1>
    <p class="mannaka">ようこそスターバックスパートナーの皆さん。お給料が出る前に自分の給与明細を確認しましょう。</p> 
    <p class="mannaka">今回はテストバージョンなので中空き等は計算できません。</p>
   
    <h2 class="mannaka"><?php echo $Year; ?>年<?php echo $Month; ?>月</h2>
    <form action="dropdown2.php" method="post"><input type="hidden" name="calDate" value="<?php echo $calDate ?>"><button class="hidari" type="submit" name="before">前月</button>
    <input type="hidden" name="calDate" value="<?php echo $calDate ?>"><button class="migi" type="submit" name="after">次月</button></form>
<br>
<br>
<table>
    <tr>
        <th id="red">日</th>
        <th id="glay">月</th>
        <th id="glay">火</th>
        <th id="glay">水</th>
        <th id="glay">木</th>
        <th id="glay">金</th>
        <th id="blue">土</th>
    </tr>

    <tr>
    <?php $cnt = 0; ?>
    <?php 
    foreach ( $CAL as $key => $value): ?>
 
        <td>
        <?php 
        
        //ここの処理が甘い　変数とか
        // $intime[$value['day']] = "intime".$value['day'];
        // $outtime[$value['day']] = "outtime".$value['day'];
        // $workDay = $value['day'];

        ?>
            <button class="menu"> <?php echo $value['day']; ?></button>
        <ul class="dakoku">
            <form name="form2" action="dropdown3.php" method="post">
            <!-- input[]に入れるんだけどどうやって取り出せばいいか考えるね -->
            <!-- input[0]output[0]~input[30]output[30]をfor文で取り出し、各々で計算する -->
            <!-- 前で初期化しなきゃダメだな -->
                <input type="time" name="<?php $intime[] ?>" min="06:00"> ~ <input type="time" name="<?php $outtime[] ?>" min="06:00">
            </form>
        </ul>

       <?php $cnt++;  ?>
        </td>
 
    <?php if ($cnt == 7): ?>
    </tr>
    <tr>
    <?php $cnt = 0; ?>
    <?php endif; ?>
 
    <?php endforeach; ?>
    </tr>

</table>
<p class="mannaka">最後に、片道の交通費とあなたの時給を入力してね。</p>
    <form name="form1" action="dropdown3.php" method="post">
    <p class="mannaka">片道<input type="number" name="trafic" value="195">円</p>
    <p class="mannaka">時給<input type="number" name="perh" value="1160">円</p>

<form action="dropdown3.php" method="post">
<div class="mannaka"><button class="output_b" type="submit">出力する</button></div>
</form>
    
    </div></body>
</html>