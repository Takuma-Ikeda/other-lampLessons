<?php

/*
 * [ブラウザ]
 * http://localhost/answer/form_quiz/form_quiz_template.php
 */

require_once "./UserRequest.php";
$errors = [];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_request = new UserRequest($_POST);
    //$_POSTはPHP内で決められた変数名
    if(is_null($user_request->getName()) || $user_request->getName() == ''){
      $errors['name']='氏名を入力してください';
    }else{
      $errors['name']='';
    }

    if(is_null($user_request->getFurigana()) || $user_request->getFurigana() == ''){
      $errors['furigana']='ふりがなを入力してください';
    }else{
      $errors['furigana']='';
    }

    if(is_null($user_request->getEmail()) || $user_request->getEmail() == ''){
      $errors['email']='メールアドレスを入力してください';
    }else{
      $errors['email']='';
    }

    if(is_null($user_request->getTel()) || $user_request->getTel() == ''){
      $errors['tel']='電話番号を入力してください';
    }else{
      $errors['tel']='';
    }

    if(is_null($user_request->getSex()) || $user_request->getSex() == ''){
      $errors['sex']='性別を選択してください';
    }else{
      $errors['sex']='';
    }

    if(is_null($user_request->getItem()) || $user_request->getItem() == ''){
      $errors['item']='お問い合わせ項目を選択してください';
    }else{
      $errors['item']='';
    }

    if(is_null($user_request->getContent()) || $user_request->getContent() == ''){
      $errors['content']='お問い合わせ内容を入力してください';
    }else{
      $errors['content']='';
    }

    if (!preg_match("/\A([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+\z/", $user_request->getEmail())) {
        $errors['email'] = 'メールアドレスを正しい形式で入力してください';
    }
    if (!preg_match("/^(0{1}\d{1,4}-{0,1}\d{1,4}-{0,1}\d{4})$/", $user_request->getTel())) {
        $errors['tel'] = '電話番号を正しい形式で入力してください';
    }

    $is_error = false;

    foreach ($errors as $error) {
        if ($error != ''){
            $is_error = true;
        }
    }

    if(!$is_error){
        
        // セッション処理開始
        session_start();
        // user_request というキーワードでセッション保存する
        $_SESSION['user_request'] = $user_request;
        // リダイレクト
        header("Location: form_quiz_template_confirm.php");
        
    }

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
        <!-- form_quiz_template_confirm.phpにリクエストを投げている -->
            <form action="form_quiz_template.php" method="post" name="form" onsubmit="return validate()">
                <h1 class="contact-title">お問い合わせ 内容入力</h1>
                <p>お問い合わせ内容をご入力の上、「確認画面へ」ボタンをクリックしてください。</p>
                <div>
                    <div>
                        <label>氏名<span>必須</span></label>
                        <input type="text" name="name" placeholder="例）山田太郎" value="小林太一">
                    </div>
                    <div class="error"><?php echo $errors['name'] ?></div>
                    <div>
                        <label>ふりがな<span>必須</span></label>
                        <input type="text" name="furigana" placeholder="例）やまだたろう" value="こばやしたいち">
                    </div>
                    <div class="error"><?php echo $errors['furigana'] ?></div>
                    <div>
                        <label>メールアドレス<span>必須</span></label>
                        <input type="text" name="email" placeholder="例）guest@example.com" value="higoronookonaigadaiji@gmail.com">
                    </div>
                    <div class="error"><?php echo $errors['email'] ?></div>
                    <div>
                        <label>電話番号<span>必須</span></label>
                        <input type="text" name="tel" placeholder="例）000-0000-0000" value="090-7211-7462">
                    </div>
                    <div class="error"><?php echo $errors['tel'] ?></div>
                    <div>
                        <label>性別<span>必須</span></label>
                        <input type="radio" name="sex" value="0" checked> 男性
                        <input type="radio" name="sex" value="1"> 女性
                        <input type="radio" name="sex" value="2"> 無回答
                    </div>
                    <div class="error"><?php echo $errors['sex'] ?></div>
                    <div>
                        <label>お問い合わせ項目<span>必須</span></label>
                        <select name="item">
                            <option value="">お問い合わせ項目を選択してください</option>
                            <option value="ご質問・お問い合わせ" selected>ご質問・お問い合わせ</option>
                            <option value="ご意見・ご感想">ご意見・ご感想</option>
                        </select>
                        <div class="error"><?php echo $errors['item'] ?></div>
                    </div>
                    <div>
                        <label>お問い合わせ内容<span>必須</span></label>
                        <textarea name="content" rows="5" placeholder="お問合せ内容を入力">音岩瀬</textarea>
                    </div>
                    <div class="error"><?php echo $errors['content'] ?></div>
                </div>
                <button type="submit">確認画面へ</button>
            </form>
        </div>
    </body>
</html>

