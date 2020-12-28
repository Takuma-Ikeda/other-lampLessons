<?php

/*
 * [ブラウザ]
 * http://localhost/answer/form_quiz/form_quiz_template.php
 */

require_once "./form_quiz_function_04.php";
require_once "./UserRequest.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_request = new UserRequest($_POST);
    $error_messages = validation($user_request);

    if (empty($error_messages)) {
        // id をセッション取得
        $id = $_SESSION['id'];
        updateDetailById($id, $user_request);
        unset($_SESSION['id']);
        header("Location: form_quiz_template_admin.php");
    }

    $error_tags = createErrorTags($error_messages);
    $value_tags = createValueTags($user_request);
}

if ($_GET["id"]) {
    // id をセッション保存
    $_SESSION['id'] = $_GET["id"];
    $row = selectDetailById($_GET["id"]);
    $user_request = new UserRequest($row);
    $error_messages = validation($user_request);
    $error_tags = createErrorTags($error_messages);
    $value_tags = createValueTags($user_request);
}

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./styles.css">
        <title>お問い合わせ 内容編集</title>
    </head>
    <body>
        <div class="admin"><h1>EeeeG</h1></div>
        <div><h2>お問い合わせ 内容編集</h2></div>
        <div>
            <form action="form_quiz_template_admin_edit.php" method="post" name="form" onsubmit="return validate()">
                <h1 class="contact-title">お問い合わせ 内容編集</h1>
                <p>お問い合わせ内容をご入力の上、「編集完了」ボタンをクリックしてください。</p>
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
                <button type="submit">編集完了</button>
            </form>
        </div>
    </body>
</html>

