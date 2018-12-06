<?php
//エラー文の表示
ini_set("display_errors", 1);
error_reporting(E_ALL);
$totalh = 0;
$countday = 0;
//動作してる
$trafic = $_POST["trafic"];
//   echo $trafic."<br>";
 
$perh = $_POST["perh"];
//   echo $perh;
  $intime = $_POST["intime"];
  $outtime = $_POST["outtime"];
// var_dump($intime);
// var_dump($outtime);
$sarary = 0;
// echo $outtime[1] - $intime[1]."<br>";
for($a = 0; $a <35; $a++){

    if($intime[$a] != "" && $outtime[$a] != ""){
        // echo $intime[$a]."<br>";
        $_intime = strtotime($intime[$a]);
        $_outtime = strtotime($outtime[$a]);
        $checkOut = date("H."."i", strtotime($outtime[$a]));
        $sCheckOut = date("H", strtotime($outtime[$a]));
        $checkIn = date("H."."i", strtotime($intime[$a]));
        $sCheckIn = date("H", strtotime($intime[$a]));
        $difIn = $checkIn - $sCheckIn;
        $difIn /= 0.6;
        $checkIn = $sCheckIn + $difIn;
        $difOut = $checkOut - $sCheckOut;
        $difOut /= 0.6;
        $checkOut = $sCheckOut + $difOut;
        // echo "checkIn=".$checkIn;
        // echo "<br>";
        // echo "checkOut=".$checkOut;
        // echo "<br>";
        if($checkOut > $checkIn){
            //休憩の計算
            $worktime = $checkOut - $checkIn;
            if($worktime > 8){
                $break = 1;
            }else if($worktime > 6){
                $break = 0.75;
            }else if($worktime > 3.5){
                $break = 0.25;
            }else{
                $break = 0;
            }
            if(22 < $checkOut){    //深夜時間も働いた場合
                $sarary += (22 - $checkIn - $break) * $perh + ($checkOut - 22) * 1.25 * $perh;
                
                // echo "sarary=".$sarary;
            }
            else{   //そうでない場合
                $sarary += ($checkOut - $checkIn - $break) * $perh;
            }
            $totalh += $checkOut - $checkIn - $break;
        }
        else{
            echo "error!!!";
            $totalh = "error";
        } 
        
        $countday++;
    }
}

$totaltrafic = $trafic * $countday * 2;
?>
<html lang="ja">
    <head>
        <meta charset="UTF-8">

            <title>フライング給与明細</title>
            <style>
            .mannaka{
    text-align: center;
}
</style>
    </head>
 
    <body><div>
    <p class="mannaka">あなたの今月の給与明細はこちらに限りなく近いでしょう。</p>
    <p class="mannaka"><strong>※正確ではないのでご注意を。</strong></p>
    <p>所定給与:<?php echo $sarary; ?>円</p>
    <p>交通費:<?php echo $totaltrafic; ?>円</p>
    <p>支給額:<?php  echo $sarary+$totaltrafic; ?>円</p>
    <p>所定労働時間(深夜時間含む): <?php echo $totalh; ?>時間</p>
    </div></body>
</html>