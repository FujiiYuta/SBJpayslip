<?php
//test1.php
//これは、配列の値がどのように違うファイルへ渡されるかを模したものである
//配列の認識を改めた方が良さそうだ
//配列が二つあった時に一つの配列のナンバーとしてもう一つの配列の値が参照されるようにするのが目的
//中に入るナンバーは$value['day']
$value['day'] = 1;
$input[$value['day']] = 15;
echo $input[1];

?>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
    </head>
 
    <body><div>

<form action="test2.php" method="post">
    <?php for($a = 0; $a < 3; $a++){ ?>
<!-- <input type="time" name="intime[]" min="06:00" value="15:00"> ~ <input type="time" name="outtime[]" min="06:00" value="23:30"> -->
<input type="time" name="intime[]" min="06:00" > ~ <input type="time" name="outtime[]" min="06:00" >

    <?php }?>
    
<!-- </form>
<form name="form1" action="test2.php" method="post"> -->
    <p class="mannaka">片道<input type="number" name="trafic" value="195">円</p>
    <p class="mannaka">時給<input type="number" name="perh" value="1160">円</p>

<button type="submit">出力する</button>
</form>
    </div></body>
</html>

