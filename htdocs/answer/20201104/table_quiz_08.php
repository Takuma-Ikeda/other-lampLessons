<?php

/*
 * [ブラウザ]
 * http://localhost/answer/20201104/table_quiz_08.php
 * [コンテナパス]
 * /var/www/html/answer/20201104
 *  php table_quiz_08.php で実行可能
 */

require "./table_quiz_08_function.php";

// 生徒数を取得 ※ チェックボックスの個数になる
$num = count(getStudentsByIds());

// チェックボックス ids 判定
if (isset($_POST['ids'])) {
    foreach ($_POST['ids'] as $id) {
        $ids[] = $id;
    }
    $students = getStudentsByIds($ids);
} else {
    $students = getStudentsByIds();
}

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./styles.css">
    </head>
    <body>
        <h1>問題 8</h1>
        <form class="student_id_form" action="table_quiz_08.php" method="post">
            <p>生徒の id を選択してください</p>
            <?php for ($i = 1; $i <= $num; $i++) { ?>
                <?php echo '<input type="checkbox" name="ids[]" value="' . $i . '">' ?>
                <?php echo $i ?>
            <?php } ?>
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
