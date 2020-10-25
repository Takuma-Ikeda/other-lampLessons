<?php

/*
 * [ブラウザ]
 * http://localhost/answer/20201104/table_quiz_06.php
 * [コンテナパス]
 * /var/www/html/answer/20201104
 *  php table_quiz_06.php で実行可能
 */

function getStudentsByIds($ids) {
    $students = [
        ['id' => 1, 'name' => '池田', 'japanese' => 0, 'math' => 0, 'society' => 0, 'science' => 0, 'english' => 0, 'programming' => 100],
        ['id' => 2, 'name' => '斉藤', 'japanese' => 80, 'math' => 80, 'society' => 80, 'science' => 80, 'english' => 80, 'programming' => 80],
        ['id' => 3, 'name' => '大塚', 'japanese' => 100, 'math' => 70, 'society' => 90, 'science' => 70, 'english' => 60, 'programming' => 80],
        ['id' => 4, 'name' => '小林', 'japanese' => 70, 'math' => 60, 'society' => 80, 'science' => 100, 'english' => 60, 'programming' => 80],
    ];

    $result = [];

    foreach ($ids as $id) {
        // id が存在する場合は配列の index (int) を取得する
        // id が存在しない場合は false (boolean) を取得する
        $index = array_search($id, array_column($students, 'id'));

        // id が存在しない場合、エラー配列を返す
        if (gettype($index) == 'boolean') {
            if (($index == false)) {
                $result[] = ['id' => $id, 'name' => 'ERROR', 'japanese' => 'ERROR', 'math' => 'ERROR', 'society' => 'ERROR', 'science' => 'ERROR', 'english' => 'ERROR', 'programming' => 'ERROR'];
            }
        } else {
            $result[] = $students[$index];
        }
    }
    return $result;
}

// 好きな id を配列で渡すことができる
$students = getStudentsByIds([1, 2, 3, 4]);

// 存在しない id を渡すと ERROR になる
// $students = getStudentById([1, 2, 3, 99]);
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./styles.css">
    </head>
    <body>
        <h1>問題 6</h1>
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


