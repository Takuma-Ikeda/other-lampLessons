<?php

require "./table_quiz_07_function.php";
$ids = [];
if (isset($_POST['ids'])) {   //もしポストリクエストが飛んで来たら
  foreach ($_POST['ids'] as $id) {
      // 送られてきた (チェックボックスの value である) id を保存する
      $ids[] =(int) $id;
  }
  $students = quiz7\getStudentsByIds($ids);
} else {
  $students = quiz7\getStudentsByIds([1,2,3,4]);
}

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./styles.css">
    </head>
    <body>
        <h1>問題 7</h1>
        <form class="student_id_form" action="tq8.php" method="post">
            <p>生徒の id を選択してください</p>
            <input type="checkbox" name="ids[]" value="1">1
            <input type="checkbox" name="ids[]" value="2">2
            <input type="checkbox" name="ids[]" value="3">3
            <input type="checkbox" name="ids[]" value="4">4
            <input type="submit" value="送信する">
        </form>
        <table>
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
                <?php foreach($students as $index => $student) { ?>
                    <?php if ($index % 2 == 0) { // 偶数 ?>
                        <tr class="even">
                    <?php } else { // 奇数 ?>
                        <tr class="odd">
                    <?php } ?>
                        <td><?php echo $student['id'] ?></td>
                        <td><?php echo $student['name'] ?></td>
                        <td><?php echo $student['japanese'] ?></td>
                        <td><?php echo $student['math'] ?></td>
                        <td><?php echo $student['society'] ?></td>
                        <td><?php echo $student['science'] ?></td>
                        <td><?php echo $student['english'] ?></td>
                        <td><?php echo $student['programming'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>