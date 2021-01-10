<?php

/*
 * [ブラウザ]
 * http://localhost/answer/form_quiz/form_quiz_template_thanks.php
 */

// require_once "./form_quiz_*.php";

$dbname = 'contact';
$host = 'other-lamplessons_mysql_1';
$dsn = 'mysql:dbname='.$dbname.';host='.$host;
$user = 'root';
$password = 'password';

$dbh = new PDO($dsn, $user, $password);
$stmt = $dbh->query(
    "SELECT detail.id, detail.name, detail.furigana, detail.email, detail.tel, sex.sex, item.item, detail.content, detail.created, detail.updated FROM detail LEFT JOIN sex ON detail.sex_id = sex.id LEFT JOIN item ON detail.item_id = item.id"
);//テーブルの結合　detail.id/テーブル名.カラム名
// JOINしているのでどのIDが抽出されるか分からない
$results = $stmt->fetchAll();

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
                <?php foreach ($results as $result) { ?>
                    <tr>
                        <td><?php echo $result['id']?></td>
                        <td><?php echo $result['name']?></td>
                        <td><?php echo $result['furigana']?></td>
                        <td><?php echo $result['email']?></td>
                        <td><?php echo $result['tel']?></td>
                        <td><?php echo $result['sex']?></td>
                        <td><?php echo $result['item']?></td>
                        <td><?php echo $result['content']?></td>
                        <td><?php echo $result['created']?></td>
                        <td><?php echo $result['updated']?></td>
                        <td><a href="./form_quiz_template_admin.php">削除</a></td>
                        <td><a href="./form_quiz_template_admin_edit.php">編集</a></td>
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
