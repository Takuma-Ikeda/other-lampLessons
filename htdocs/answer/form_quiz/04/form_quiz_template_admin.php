<?php

/*
 * [ブラウザ]
 * http://localhost/answer/form_quiz/form_quiz_template_thanks.php
 */

require_once "./form_quiz_function_04.php";

// レコード削除処理
if ($_GET["id"]) {
    deleteDetailById($_GET["id"]);
}

$rows = selectDetails();

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./styles.css">
        <title>お問い合わせ 管理画面</title>
    </head>
    <body>
        <div class="admin"><h1>EeeeG</h1></div>
        <div><h2>管理画面</h2> </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>氏名</th>
                    <th>ふりがな</th>
                    <th>メールアドレス</th>
                    <th>電話番号</th>
                    <th>性別</th>
                    <th>お問い合わせ項目</th>
                    <th>お問い合わせ内容</th>
                    <th>作成日時</th>
                    <th>更新日時</th>
                    <th>削除</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row ) {?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['furigana'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['tel'] ?></td>
                        <td><?php echo $row['sex'] ?></td>
                        <td><?php echo $row['item'] ?></td>
                        <td><?php echo $row['content'] ?></td>
                        <td><?php echo $row['created'] ?></td>
                        <td><?php echo $row['updated'] ?></td>
                        <?php echo '<td><a href="./form_quiz_template_admin.php?id=' . $row['id'] . '">削除</a></td>' ?>
                        <?php echo '<td><a href="./form_quiz_template_admin_edit.php?id=' . $row['id']  . '">編集</a></td>' ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="nav-links">
            <a class="prev page-numbers" href="./form_quiz_template_admin.php">«</a>
            <a class="page-numbers" href="./form_quiz_template_admin.php">1</a>
            <span class="page-numbers current">2</span>
            <a class="page-numbers" href="./form_quiz_template_admin.php">3</a>
            <span class="page-numbers dots">…</span>
            <a class="page-numbers" href="./form_quiz_template_admin.php">10</a>
            <a class="next page-numbers" href="./form_quiz_template_admin.php">»</a>
        </div>

    </body>
</html>
