<?php

/*
 * [ブラウザ]
 * http://localhost/answer/form_quiz/form_quiz_template_thanks.php
 */

// require_once "./form_quiz_*.php";

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
                <tr>
                    <td>1</td>
                    <td>池田拓馬</td>
                    <td>いけだたくま</td>
                    <td>eeeeg.takuma.ikeda@gmail.com</td>
                    <td>080-3178-3566</td>
                    <td>男性</td>
                    <td>ご質問・お問い合わせ</td>
                    <td>はじめまして。求人募集していますか？</td>
                    <td>2020-12-01 12:00:00</td>
                    <td>2020-12-01 12:00:00</td>
                    <td><a href="./form_quiz_template_admin.php">削除</a></td>
                    <td><a href="./form_quiz_template_admin_edit.php">編集</a></td>
                </tr>
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
