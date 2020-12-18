<?php

/*
 * [ブラウザ]
 * http://localhost/answer/form_quiz/form_quiz_template_confirm.php
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
            <?php echo '<input hidden type="text" name="name" placeholder="例）山田太郎" value="' . $user_request->getName().'">';?>
            <?php echo '<input hidden type="text" name="furigana" placeholder="例）やまだたろう" value="' . $user_request->getFurigana().'">';?>
            <?php echo '<input hidden type="text" name="email" placeholder="例）guest@example.com" value="' .$user_request->getEmail().'">';?>       
            <?php echo '<input hidden type="text" name="tel" placeholder="例）000-0000-0000" value="' .$user_request->getTel().'">';?>       
            <?php echo '<input hidden type="radio" name="sex" value="' .$user_request->getSex().'">';?>       
            <?php echo '<input hidden type="text" name="item" value="'.$user_request->getItem().'">';?>       
            <?php echo '<input hidden type="text" name="content" value="'.$user_request->getContent().'">';?>
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
                        <p><?php 
                        if ($user_request->getSex()=='0'){
                            echo '男性';
                        } else if ($user_request->getSex()=='1'){
                            echo '女性';
                        } else {
                            echo '無回答';
                        }
                        ?></p>
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

