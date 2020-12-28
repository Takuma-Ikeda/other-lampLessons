<?php

/*
 * [ブラウザ]
 * http://localhost/answer/form_quiz/01/form_quiz_template_thanks.php
 */

require_once "./UserRequest.php";
require_once "./form_quiz_function_03.php";

session_start();
$user_request = $_SESSION['user_request'];

if (is_null($user_request)) {
    unset($_SESSION['user_request']);
    header("Location: form_quiz_template.php");
} else {
    insertDetail($user_request);
}

unset($_SESSION['user_request']);

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./styles.css">
        <title>お問い合わせ 送信完了</title>
    </head>
    <body>
        <div><h1>EeeeG</h1></div>
        <div><h2>お問い合わせ</h2> </div>
        <div>
            <div>
                <h1>お問い合わせ 送信完了</h1>
                <p>
                    お問い合わせありがとうございました。<br>
                    内容を確認のうえ、回答させて頂きます。<br>
                    しばらくお待ちください。
                </p>
                <a href="form_quiz_template.php">
                    <button type="button">お問い合わせに戻る</button>
                </a>
            </div>
        </div>
    </body>
</html>
