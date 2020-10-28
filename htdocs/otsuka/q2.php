<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Hoshi</title>
</head>
<body>
  <p>

    <?php
    for($i=1;$i<=5;$i++){

    if($i % 2 == 0){
    echo  '☆' . PHP_EOL;
    }else{
    echo '★' . PHP_EOL;
    }
  }
    ?>

</body>
</html>