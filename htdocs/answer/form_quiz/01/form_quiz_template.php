<?php

/*
 * [ブラウザ]
 * http://localhost/answer/form_quiz/01/form_quiz_template.php
 */

require_once "./form_quiz_function_01.php";
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
                        <input type="text" name="name" placeholder="例）山田太郎" value="">
                    </div>
                    <?php echo $error_tags[UserRequest::NAME] ?>
                    <div>
                        <label>ふりがな<span>必須</span></label>
                        <input type="text" name="furigana" placeholder="例）やまだたろう" value="">
                    </div>
                    <?php echo $error_tags[UserRequest::FURIGANA] ?>
                    <div>
                        <label>メールアドレス<span>必須</span></label>
                        <input type="text" name="email" placeholder="例）guest@example.com" value="">
                    </div>
                    <?php echo $error_tags[UserRequest::EMAIL] ?>
                    <div>
                        <label>電話番号<span>必須</span></label>
                        <input type="text" name="tel" placeholder="例）000-0000-0000" value="">
                    </div>
                    <?php echo $error_tags[UserRequest::TEL] ?>
                    <div>
                        <label>性別<span>必須</span></label>
                        <input type="radio" name="sex" value="0" checked> 男性
                        <input type="radio" name="sex" value="1"> 女性
                        <input type="radio" name="sex" value="2"> 無回答
                    </div>
                    <?php echo $error_tags[UserRequest::SEX] ?>
                    <div>
                        <label>お問い合わせ項目<span>必須</span></label>
                        <select name="item">
                            <option value="">お問い合わせ項目を選択してください</option>
                            <option value="ご質問・お問い合わせ">ご質問・お問い合わせ</option>
                            <option value="ご意見・ご感想">ご意見・ご感想</option>
                        </select>
                        <?php echo $error_tags[UserRequest::ITEM] ?>
                    </div>
                    <div>
                        <label>お問い合わせ内容<span>必須</span></label>
                        <textarea name="content" rows="5" placeholder="お問合せ内容を入力"></textarea>
                    </div>
                    <?php echo $error_tags[UserRequest::CONTENT] ?>
                </div>
                <button type="submit">確認画面へ</button>
            </form>
        </div>
    </body>
</html>

