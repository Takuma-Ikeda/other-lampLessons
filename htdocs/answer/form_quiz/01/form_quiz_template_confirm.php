<?php

/*
 * [ブラウザ]
 * http://localhost/answer/form_quiz/01/form_quiz_template_confirm.php
 */

require_once "./UserRequest.php";

session_start();
$user_request = $_SESSION['user_request'];

if (is_null($user_request)) {
    unset($_SESSION['user_request']);
    header("Location: form_quiz_template.php");
}

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
                        <p><?php echo $user_request->getName() ?></p>
                    </div>
                    <div>
                        <label>ふりがな</label>
                        <p><?php echo $user_request->getFurigana() ?></p>
                    </div>
                    <div>
                        <label>メールアドレス</label>
                        <p><?php echo $user_request->getEmail() ?></p>
                    </div>
                    <div>
                        <label>電話番号</label>
                        <p><?php echo $user_request->getTel() ?></p>
                    </div>
                    <div>
                        <label>性別</label>
                        <p><?php if ($user_request->getSex() == '0') echo '男性' ?></p>
                        <p><?php if ($user_request->getSex() == '1') echo '女性' ?></p>
                        <p><?php if ($user_request->getSex() == '2') echo '未回答' ?></p>
                    </div>
                    <div>
                        <label>お問い合わせ項目</label>
                        <p><?php echo $user_request->getItem() ?></p>
                    </div>
                    <div>
                        <label>お問い合わせ内容</label>
                        <p><?php echo $user_request->getContent() ?></p>
                    </div>
                </div>

                <input type="button" value="内容を修正する" onclick="history.back(-1)">
                <button type="submit" name="submit">送信する</button>
            </form>
        </div>
    </body>
</html>
