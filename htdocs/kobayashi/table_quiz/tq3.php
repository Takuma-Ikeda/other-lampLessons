<?php
 function getStudents(){
  return [
    ['id' => 1, 'name' => '池田', 'japanese' => 0, 'math' => 0, 'society' => 0, 'science' => 0, 'english' => 0, 'programming' => 100],
    ['id' => 2, 'name' => '斉藤', 'japanese' => 80, 'math' => 80, 'society' => 80, 'science' => 80, 'english' => 80, 'programming' => 80],
    ['id' => 3, 'name' => '大塚', 'japanese' => 100, 'math' => 70, 'society' => 90, 'science' => 70, 'english' => 60, 'programming' => 80],
    ['id' => 4, 'name' => '小林', 'japanese' => 70, 'math' => 60, 'society' => 80, 'science' => 100, 'english' => 60, 'programming' => 80],
  ];
 }

 $scores = getStudents();
//  var_dump($scores);



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
        echo $scores[0]['id']  ?></td>
        <td><?php
        echo $scores[0]['name']  ?></td>
        <td><?php
        echo $scores[0]['japanese']  ?></td>
        <td><?php
        echo $scores[0]['math']  ?></td>
        <td><?php
        echo $scores[0]['society']  ?></td>
        <td><?php
        echo $scores[0]['science']  ?></td>
        <td><?php
        echo $scores[0]['english']  ?></td>
        <td><?php
        echo $scores[0]['programming']  ?></td>
      </tr>
      <tr>
        <td><?php
        echo $scores[1]['id']  ?></td>
        <td><?php
        echo $scores[1]['name']  ?></td>
        <td><?php
        echo $scores[1]['japanese']  ?></td>
        <td><?php
        echo $scores[1]['math']  ?></td>
        <td><?php
        echo $scores[1]['society']  ?></td>
        <td><?php
        echo $scores[1]['science']  ?></td>
        <td><?php
        echo $scores[1]['english']  ?></td>
        <td><?php
        echo $scores[1]['programming']  ?></td>
      </tr>
      <tr>
        <td><?php
        echo $scores[2]['id']  ?></td>
        <td><?php
        echo $scores[2]['name']  ?></td>
        <td><?php
        echo $scores[2]['japanese']  ?></td>
        <td><?php
        echo $scores[2]['math']  ?></td>
        <td><?php
        echo $scores[2]['society']  ?></td>
        <td><?php
        echo $scores[2]['science']  ?></td>
        <td><?php
        echo $scores[2]['english']  ?></td>
        <td><?php
        echo $scores[2]['programming']  ?></td>
      </tr>
      <tr>
        <td><?php
        echo $scores[3]['id']  ?></td>
        <td><?php
        echo $scores[3]['name']  ?></td>
        <td><?php
        echo $scores[3]['japanese']  ?></td>
        <td><?php
        echo $scores[3]['math']  ?></td>
        <td><?php
        echo $scores[3]['society']  ?></td>
        <td><?php
        echo $scores[3]['science']  ?></td>
        <td><?php
        echo $scores[3]['english']  ?></td>
        <td><?php
        echo $scores[3]['programming']  ?></td>
      </tr>
      
    </tbody>
    </table>
  </body>
</html>