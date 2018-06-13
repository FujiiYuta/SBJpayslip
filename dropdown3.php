<?php
//エラー文の表示
ini_set("display_errors", 1);
error_reporting(E_ALL);
$totalh = 0;
$countday = 0;
$trafic = $_POST["trafic"];
// echo $trafic;
$perh = $_POST["perh"];
// echo $perh;
$sarary = 0;
for($a = ０; $a <31; $a++){
$intime[$a] = $_POST[$intime[$a]];
$outtime[$a] = $_POST[$outtime[$a]];
//$_POST[]の中身ってクオーテーションで囲われてるべきなんだよな
    if(isset($intime[$a]) && (isset($outtime[$a]))){
        if($outtime[$a] > $intime[$a]){
            if(22 <= $outtime[$a]){
                $sarary = $sarary + (22 - $intime[$a]) * $perh + ($outtime[$a] - 22) * 1.25 * $perh;
            }
            else{
                $sarary = ($outtime[$a] - $intime[$a]) * $perh;
            }
            $totalh = $totalh + $outtime[$a] - $intime[$a];
        }
        else{
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
    <p>所定労働時間: <?php echo $totalh; ?>時間</p>
    </div></body>
</html>