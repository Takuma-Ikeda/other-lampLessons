<?php

/*
 * [ブラウザ]
 * http://localhost/answer/20201104/table_quiz_02.php
 * [コンテナパス]
 * /var/www/html/answer/20201104
 *  php table_quiz_02.php で実行可能
 */

function getStudent() {
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

$student = getStudent();

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./styles.css">
    </head>
    <body>
        <h1>問題 2</h1>
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
                <tr>
                    <td><?php echo $student['id'] ?></td>
                    <td><?php echo $student['name'] ?></td>
                    <td><?php echo $student['japanese'] ?></td>
                    <td><?php echo $student['math'] ?></td>
                    <td><?php echo $student['society'] ?></td>
                    <td><?php echo $student['science'] ?></td>
                    <td><?php echo $student['english'] ?></td>
                    <td><?php echo $student['programming'] ?></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>


