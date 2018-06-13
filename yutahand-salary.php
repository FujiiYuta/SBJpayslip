<html lang="ja">
    <head>
        <meta charset="UTF-8">

            <title>SBJAPTR-給与計算-</title>
    </head>
 
    <body>
    <p></p>
       <?php
       $salary=0;
        $count=0;
function h($str){return htmlspecialchars($str, ENT_QUOTES, "UTF-8");}


if(isset($_GET['hs'])) $hs=$_GET['hs'];
if(isset($_GET['trafic'])) $trafic=$_GET['trafic'];  

if(isset($_GET['san'])){ 
    $san=$_GET['san'];  
    $sans=$hs*

}
if(isset($_GET['santen'])) $santen=$_GET['santen'];  
if(isset($_GET['yon'])) $yon=$_GET['yon'];  
if(isset($_GET['yonten'])) $yonten=$_GET['yonten'];  
if(isset($_GET['go'])) $go=$_GET['go'];
if(isset($_GET['goten'])) $goten=$_GET['goten'];  
if(isset($_GET['roku'])) $roku=$_GET['roku'];  
if(isset($_GET['rokuten'])) $rokuten=$_GET['rokuten'];     
if(isset($_GET['nana'])) $nana=$_GET['nana'];  
if(isset($_GET['nanaten'])) $nanaten=$_GET['nanaten'];
if(isset($_GET['hati'])) $hati=$_GET['hati'];    
if(isset($_GET['hatiten'])) $hatiten=$_GET['hatiten'];  

if(isset($_GET['mae1'])) $mae1=$_GET['mae1'];  
if(isset($_GET['ato1'])) $ato1=$_GET['ato1'];  
if(isset($_GET['custom1'])) $custom1=$_GET['custom1'];  
if(isset($_GET['mae2'])) $mae2=$_GET['mae2'];  
if(isset($_GET['ato2'])) $ato2=$_GET['ato2'];  
if(isset($_GET['custom2'])) $custom2=$_GET['custom2'];  
if(isset($_GET['mae3'])) $mae3=$_GET['mae3'];  
if(isset($_GET['ato3'])) $ato3=$_GET['ato3'];  
if(isset($_GET['custom3'])) $custom3=$_GET['custom3'];  


if(issset($hs)){
$count=$san+$santen+$yon+$yonten+$go+$goten+$roku+$rokuten+$nana+$nanaten+$hati+$hatiten;
$salary=$count*$trafic+$hs
}
       ?>
        <h2>情報入力</h2>
        <p>あなたの時給と入ったシフトの時間と回数、往復の交通費を入力してください。</p>
        <form action=yuahand-salary.php method="get">
                <table border=0 cellpadding=0 cellspacing=0>
                        <tr><td>時給:</td><td><input type=text size=20 name=hs></td><td>回</td></tr>
                        <tr><td>往復交通費:</td><td> <input type=text size=20 name=trafic></td><td>回</td></tr>
                        <tr><td>15-cl:</td><td> <input type=text size=10 name=san></td><td>回</td></tr>
                        <tr><td>15.5-cl:</td><td> <input type=text size=10 name=santen></td><td>回</td></tr>
                        <tr><td>16-cl:</td><td><input type=text size=10 name=yon></td><td>回</td></tr>
                        <tr><td>16.5-cl:</td><td> <input type=text size=10 name=yonten></td><td>回</td></tr>
                        <tr><td>17-cl:</td><td> <input type=text size=10 name=go></td><td>回</td></tr>
                        <tr><td>17.5-cl:</td><td><input type=text size=10 name=goten></td><td>回</td></tr>
                        <tr><td>18-cl:</td><td> <input type=text size=10 name=roku></td><td>回</td></tr>
                        <tr><td>18.5-cl:</td><td> <input type=text size=10 name=rokuten></td><td>回</td></tr>
                        <tr><td>19-cl:</td><td><input type=text size=10 name=nana></td><td>回</td></tr>
                        <tr><td>19.5-cl:</td><td> <input type=text size=10 name=nanaten></td><td>回</td></tr>
                        <tr><td>20-cl:</td><td> <input type=text size=10 name=hati></td><td>回</td></tr>
                        <tr><td>20.5-cl:</td><td><input type=text size=10 name=hatiten></td><td>回</td></tr>
                        </table>
                        <p>クローズ以外で入った日はこちらに入力してください。</p>
                        <table border=0 cellpadding=0 cellspacing=0>
                            <tr><td><input type=text size=10 name=mae1></td><td>~</td><td><input type=text size=10 name=ato1><td>:</td><td><input type=text size=10 name=custom1></td><td>回</td></tr>
                            <tr><td><input type=text size=10 name=mae2></td><td>~</td><td><input type=text size=10 name=ato2><td>:</td><td><input type=text size=10 name=custom2></td><td>回</td></tr>
                            <tr><td><input type=text size=10 name=mae3></td><td>~</td><td><input type=text size=10 name=ato3><td>:</td><td><input type=text size=10 name=custom3></td><td>回</td></tr>
                        </table>
        </form>
    
    </body>
</html>