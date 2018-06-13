<!-- ドロップダウン専用 -->

<html lang="ja">
    <head>
        <meta charset="UTF-8">

          <title>ドロップダウン</title>
         
         <script src="http://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script>
          <script>
        $(function(){
  $("#menu").on("click", function(){
    if ($(this).next().css("display") == "none"){
      $(this).next().slideDown();
    } else {
      $(this).next().slideUp();
    }
  });
});
          </script>
          <style type="text/css">
          .recipe{
              display: none;
              /* width:100%; */
          }
          #menu{
              width: 100px;
              height: 100px;
          }
          </style>
    </head>
 
    <body><div>
    <p>ここにhidden属性(最初は可視化するけどね)でボタンを作り、ドロップダウンにします。</p>
    <button id="menu">ここをクリック</button>
    <ul class="recipe">
    <input type="time" name="jikan" value="15:00"> ~ <input type="time" name="jikan" value="23:30">
  </ul>
    </div></body>
</html>