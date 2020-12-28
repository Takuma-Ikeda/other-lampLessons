<?php

/*
 * [ブラウザ]
 * http://localhost/answer/form_quiz/01/form_quiz_template_thanks.php
 */

require_once "./UserRequest.php";

// docker-compose ps で表示されるコンテナ名
const HOST     = 'other-lamplessons_mysql_1';
const DB       = 'contact';
const USER     = 'root';
const PASSWORD = 'password';
const CHARSET  = 'utf8';
const DSN      = 'mysql:dbname=' . DB . ';host=' . HOST .';charset=' . CHARSET;

session_start();
$user_request = $_SESSION['user_request'];

if (is_null($user_request)) {
    unset($_SESSION['user_request']);
    header("Location: form_quiz_template.php");
} else {
    try {
        $pdo = new PDO(DSN, USER, PASSWORD);
        $sql = 'INSERT INTO detail (name, furigana, email, tel, sex_id, item_id, content) VALUE (:name, :furigana, :email, :tel, :sex_id, :item_id, :content)';
        $prepare = $pdo->prepare($sql);
        $prepare->bindValue(
            ':name',
            $user_request->getName(),
            PDO::PARAM_STR
        );
        $prepare->bindValue(
            ':furigana',
            $user_request->getFurigana(),
            PDO::PARAM_STR
        );
        $prepare->bindValue(
            ':email',
            $user_request->getEmail(),
            PDO::PARAM_STR
        );
        $prepare->bindValue(
            ':tel',
            $user_request->getTel(),
            PDO::PARAM_STR
        );
        $prepare->bindValue(
            ':sex_id',
            $user_request->getSexId(),
            PDO::PARAM_INT
        );
        $prepare->bindValue(
            ':item_id',
            $user_request->getItemId(),
            PDO::PARAM_INT
        );
        $prepare->bindValue(
            ':content',
            $user_request->getContent(),
            PDO::PARAM_STR
        );
        $prepare->execute();
    } catch (PDOException $e) {
        echo "データベースエラー: " . $e->getMessage() . PHP_EOL;
        exit();
    }
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
