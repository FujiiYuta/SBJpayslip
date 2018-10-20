<?php
//エラー文の表示
ini_set("display_errors", 1);
error_reporting(E_ALL);
// echo $_POST[$intime[1]]; 
// echo $_POST[$outtime[1]];
$a = $_POST["intime"];
$b = $_POST["outtime"];
// var_dump($a);
// var_dump($b);
//  echo $a[1];
//  echo $b[1];
$_b = strtotime($b[1]);
$_b1 = date("H."."i", strtotime($b[1]));
$_b2 = date("H", strtotime($b[1]));
$_a1 = date("H."."i", strtotime($a[1]));
$_a2 = date("H", strtotime($a[1]));
$_a = strtotime($a[1]);
$dif = ($_b - $_a)/3600;
// echo $_a."<br>";
// echo $_b."<br>";
echo "_b1=".$_b1."<br>";
$check = $_b1 - 22;
// echo "<br>";
echo "↓<br>";
if($check > 0){
    $cnt = $_b2-22;
    $check -= $cnt;
    $check /= 0.6;
    // $cnt += $check;
    echo "変更後の_b1=";
    echo $_b3 = $_b2+$check;
}
echo "<br>";
echo "_a1=".$_a1;
echo "<br>";
$difIn = $_a1 - $_a2;
echo "difIn=".$difIn;
$difIn /= 0.6;
echo "<br>";
echo "変更後の_a1=";
echo $_a3 = $_a2 + $difIn;
echo "<br>";
echo "diff=";
echo $_b3 - $_a3;


echo "<br>";
echo "dif=".$dif;

?>