<?php

/*
 * [ブラウザ]
 * http://localhost/answer/form_quiz/form_quiz_template.php
 */

// require_once "./form_quiz_*.php";

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
            <form action="form_quiz_template_confirm.php" method="post" name="form" onsubmit="return validate()">
                <h1 class="contact-title">お問い合わせ 内容入力</h1>
                <p>お問い合わせ内容をご入力の上、「確認画面へ」ボタンをクリックしてください。</p>
                <div>
                    <div>
                        <label>氏名<span>必須</span></label>
                        <input type="text" name="name" placeholder="例）山田太郎" value="">
                    </div>
                    <div class="error"><?php // 氏名エラー ?></div>
                    <div>
                        <label>ふりがな<span>必須</span></label>
                        <input type="text" name="furigana" placeholder="例）やまだたろう" value="">
                    </div>
                    <div class="error"><?php // ふりがなエラー ?></div>
                    <div>
                        <label>メールアドレス<span>必須</span></label>
                        <input type="text" name="email" placeholder="例）guest@example.com" value="">
                    </div>
                    <div class="error"><?php // メールアドレスエラー ?></div>
                    <div>
                        <label>電話番号<span>必須</span></label>
                        <input type="text" name="tel" placeholder="例）000-0000-0000" value="">
                    </div>
                    <div class="error"><?php // 電話番号エラー ?></div>
                    <div>
                        <label>性別<span>必須</span></label>
                        <input type="radio" name="sex" value="0" checked> 男性
                        <input type="radio" name="sex" value="1"> 女性
                        <input type="radio" name="sex" value="2"> 無回答
                    </div>
                    <div class="error"><?php // 性別エラー ?></div>
                    <div>
                        <label>お問い合わせ項目<span>必須</span></label>
                        <select name="item">
                            <option value="">お問い合わせ項目を選択してください</option>
                            <option value="ご質問・お問い合わせ">ご質問・お問い合わせ</option>
                            <option value="ご意見・ご感想">ご意見・ご感想</option>
                        </select>
                        <div class="error"><?php // お問い合わせ項目エラー ?></div>
                    </div>
                    <div>
                        <label>お問い合わせ内容<span>必須</span></label>
                        <textarea name="content" rows="5" placeholder="お問合せ内容を入力"></textarea>
                    </div>
                    <div class="error"><?php // お問い合わせ内容エラー ?></div>
                </div>
                <button type="submit">確認画面へ</button>
            </form>
        </div>
    </body>
</html>

