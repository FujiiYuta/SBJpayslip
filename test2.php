<?php
//エラー文の表示
ini_set("display_errors", 1);
error_reporting(E_ALL);
// echo $_POST[$intime[1]]; 
// echo $_POST[$outtime[1]];
$a = $_POST["intime"];
$b = $_POST["outtime"];
var_dump($a);
var_dump($b);
echo $a[1];
?>