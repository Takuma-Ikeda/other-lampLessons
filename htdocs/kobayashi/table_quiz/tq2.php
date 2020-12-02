<?php
 function getStudent(){
   return array(
    'id'          => 1,
    'name'        => '池田',
    'japanese'    => 0,
    'math'        => 0,
    'society'     => 0,
    'science'     => 0,
    'english'     => 0,
    'programming' => 100,
   );
 }

 $score = getStudent();
//  var_dump($score);



?>
<!DOCTYPE html>
<html lang="ja">
  <head>
  <meta-charset="utf-8">
  <title>テスト点数表</title>
  </head>

  <body>
  <table border="1" style="border-collapse: collapse; border-color:blue;">

    <thead>
      <tr>
      <th>id</th>
      <th>名前</th>
      <th>国語</th>
      <th>算数</th>
      <th>社会</th>
      <th>理科</th>
      <th>英語</th>
      <th>プログラミング</th>  
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php
        echo $score['id'] ?></td>
        <td><?php
        echo $score['name'] ?></td>
        <td><?php
        echo $score['japanese'] ?></td>
        <td><?php
        echo $score['math'] ?></td>
        <td><?php
        echo $score['society'] ?></td>
        <td><?php
        echo $score['science'] ?></td>
        <td><?php
        echo $score['english'] ?></td>
        <td><?php
        echo $score['programming'] ?></td>    
      </tr>
    </tbody>
    </table>
  </body>
</html>