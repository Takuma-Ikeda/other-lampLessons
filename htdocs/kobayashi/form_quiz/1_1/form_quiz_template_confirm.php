<?php

/*
 * [ブラウザ]
 * http://localhost/answer/form_quiz/form_quiz_template_confirm.php
 */

// require_once "./form_quiz_*.php";
// もしPOSTがあれば
if ($_POST) {
    var_dump($_POST);
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
            <?php echo '<input hidden type="text" name="name" placeholder="例）山田太郎" value="' . $_POST['name'].'">';?>
            <?php echo '<input hidden type="text" name="furigana" placeholder="例）やまだたろう" value="' . $_POST['furigana'].'">';?>
            <?php echo '<input hidden type="text" name="email" placeholder="例）guest@example.com" value="' .$_POST['email'].'">';?>       
            <?php echo '<input hidden type="text" name="tel" placeholder="例）000-0000-0000" value="' .$_POST['tel'].'">';?>       
            <?php echo '<input hidden type="radio" name="sex" value="' .$_POST['sex'].'">';?>       
            <?php echo '<input hidden type="text" name="item" value="'.$_POST['item'].'">';?>       
            <?php echo '<input hidden type="text" name="content" value="'.$_POST['content'].'">';?>
                <h1 class="contact-title">お問い合わせ 内容確認</h1>
                <p>
                    お問い合わせ内容はこちらで宜しいでしょうか？<br>
                    よろしければ「送信する」ボタンを押して下さい。
                </p>

                <div>
                    <div>
                        <label>氏名</label>
                        <p><?php echo $_POST['name'] ?></p>
                    </div>
                    <div>
                        <label>ふりがな</label>
                        <p><?php echo $_POST['furigana'] ?></p>
                    </div>
                    <div>
                        <label>メールアドレス</label>
                        <p><?php echo $_POST['email'] ?></p>
                    </div>
                    <div>
                        <label>電話番号</label>
                        <p><?php echo $_POST['tel'] ?></p>
                    </div>
                    <div>
                        <label>性別</label>
                        <p><?php 
                        if ($_POST['sex']=='0'){
                            echo '男性';
                        } else if ($_POST['sex']=='1'){
                            echo '女性';
                        } else {
                            echo '無回答';
                        }
                        ?></p>
                    </div>
                    <div>
                        <label>お問い合わせ項目</label>
                        <p><?php echo $_POST['item'] ?></p>
                    </div>
                    <div>
                        <label>お問い合わせ内容</label>
                        <p><?php echo $_POST['content'] ?></p>
                    </div>
                </div>

                <input type="button" value="内容を修正する" onclick="history.back(-1)">
                <button type="submit" name="submit">送信する</button>
            </form>
        </div>
    </body>
</html>

