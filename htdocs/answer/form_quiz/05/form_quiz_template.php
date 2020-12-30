<?php

/*
 * [ブラウザ]
 * http://localhost/answer/form_quiz/01/form_quiz_template.php
 */

require_once "./form_quiz_function_05.php";
require_once "./UserRequest.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_request = new UserRequest($_POST);
    $error_messages = validation($user_request);

    if (empty($error_messages)) {
        // セッション保存
        session_start();
        $_SESSION['user_request'] = $user_request;
        header("Location: form_quiz_template_confirm.php");
    }

    $error_tags = createErrorTags($error_messages);
    $value_tags = createValueTags($user_request);

// 初期画面
} else {
    $error_tags = createErrorTags(null);
    $value_tags = createValueTags(null);
}

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./styles.css">
        <title>お問い合わせ 内容入力</title>
    </head>
    <body>
        <div><h1>EeeeG</h1></div>
        <div><h2>お問い合わせ</h2></div>
        <div>
            <form action="form_quiz_template.php" method="post" name="form" onsubmit="return validate()">
                <h1 class="contact-title">お問い合わせ 内容入力</h1>
                <p>お問い合わせ内容をご入力の上、「確認画面へ」ボタンをクリックしてください。</p>
                <div>
                    <div>
                        <label>氏名<span>必須</span></label>
                        <?php echo $value_tags[UserRequest::NAME] ?>
                    </div>
                    <?php echo $error_tags[UserRequest::NAME] ?>
                    <div>
                        <label>ふりがな<span>必須</span></label>
                        <?php echo $value_tags[UserRequest::FURIGANA] ?>
                    </div>
                    <?php echo $error_tags[UserRequest::FURIGANA] ?>
                    <div>
                        <label>メールアドレス<span>必須</span></label>
                        <?php echo $value_tags[UserRequest::EMAIL] ?>
                    </div>
                    <?php echo $error_tags[UserRequest::EMAIL] ?>
                    <div>
                        <label>電話番号<span>必須</span></label>
                        <?php echo $value_tags[UserRequest::TEL] ?>
                    </div>
                    <?php echo $error_tags[UserRequest::TEL] ?>
                    <div>
                        <label>性別<span>必須</span></label>
                        <?php echo $value_tags[UserRequest::SEX][0] ?>
                        <?php echo $value_tags[UserRequest::SEX][1] ?>
                        <?php echo $value_tags[UserRequest::SEX][2] ?>
                    </div>
                    <?php echo $error_tags[UserRequest::SEX] ?>
                    <div>
                        <label>お問い合わせ項目<span>必須</span></label>
                        <select name="item_id">
                            <?php echo $value_tags[UserRequest::ITEM][0] ?>
                            <?php echo $value_tags[UserRequest::ITEM][1] ?>
                            <?php echo $value_tags[UserRequest::ITEM][2] ?>
                        </select>
                        <?php echo $error_tags[UserRequest::ITEM] ?>
                    </div>
                    <div>
                        <label>お問い合わせ内容<span>必須</span></label>
                        <?php echo $value_tags[UserRequest::CONTENT] ?>
                    </div>
                    <?php echo $error_tags[UserRequest::CONTENT] ?>
                </div>
                <button type="submit">確認画面へ</button>
            </form>
        </div>
    </body>
</html>

