<?php

/*
 * [ブラウザ]
 * http://localhost/answer/20201104/table_quiz_04.php
 * [コンテナパス]
 * /var/www/html/answer/20201104
 *  php table_quiz_04.php で実行可能
 */

function getStudents() {
    return [
        ['id' => 1, 'name' => '池田', 'japanese' => 0, 'math' => 0, 'society' => 0, 'science' => 0, 'english' => 0, 'programming' => 100],
        ['id' => 2, 'name' => '斉藤', 'japanese' => 80, 'math' => 80, 'society' => 80, 'science' => 80, 'english' => 80, 'programming' => 80],
        ['id' => 3, 'name' => '大塚', 'japanese' => 100, 'math' => 70, 'society' => 90, 'science' => 70, 'english' => 60, 'programming' => 80],
        ['id' => 4, 'name' => '小林', 'japanese' => 70, 'math' => 60, 'society' => 80, 'science' => 100, 'english' => 60, 'programming' => 80],
    ];
}

$students = getStudents();

// 配列の要素数を取得
$num = count($students);

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./styles.css">
    </head>
    <body>
        <h1>問題 4</h1>
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
                <?php for ($i = 0; $i < $num; $i++) { // 配列の要素数だけループを回す  ?>
                    <tr>
                        <td><?php echo $students[$i]['id'] ?></td>
                        <td><?php echo $students[$i]['name'] ?></td>
                        <td><?php echo $students[$i]['japanese'] ?></td>
                        <td><?php echo $students[$i]['math'] ?></td>
                        <td><?php echo $students[$i]['society'] ?></td>
                        <td><?php echo $students[$i]['science'] ?></td>
                        <td><?php echo $students[$i]['english'] ?></td>
                        <td><?php echo $students[$i]['programming'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>


