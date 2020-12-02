<?php

/*
 * [ブラウザ]
 * http://localhost/answer/form_quiz/form_quiz_template_confirm.php
 */

// require_once "./form_quiz_*.php";

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./styles.css">
        <title>お問い合わせ 内容確認</title>
    </head>
    <body>
        <div><h1>EeeeG</h1></div>
        <div><h2>お問い合わせ</h2></div>
        <div>
            <form action="form_quiz_template_thanks.php" method="post">

                <h1 class="contact-title">お問い合わせ 内容確認</h1>

                <p>
                    お問い合わせ内容はこちらで宜しいでしょうか？<br>
                    よろしければ「送信する」ボタンを押して下さい。
                </p>

                <div>
                    <div>
                        <label>氏名</label>
                        <p><?php // 氏名 ?></p>
                    </div>
                    <div>
                        <label>ふりがな</label>
                        <p><?php // ふりがな ?></p>
                    </div>
                    <div>
                        <label>メールアドレス</label>
                        <p><?php // メールアドレス ?></p>
                    </div>
                    <div>
                        <label>電話番号</label>
                        <p><?php // 電話番号 ?></p>
                    </div>
                    <div>
                        <label>性別</label>
                        <p><?php // 性別 ?></p>
                    </div>
                    <div>
                        <label>お問い合わせ項目</label>
                        <p><?php // お問い合わせ項目 ?></p>
                    </div>
                    <div>
                        <label>お問い合わせ内容</label>
                        <p><?php // お問い合わせ内容 ?></p>
                    </div>
                </div>

                <input type="button" value="内容を修正する" onclick="history.back(-1)">
                <button type="submit" name="submit">送信する</button>
            </form>
        </div>
    </body>
</html>

