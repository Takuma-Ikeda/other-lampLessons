<?php

/*
 * [ブラウザ]
 * http://localhost/kobayashi/form_quiz/2/form_quiz_template_thanks.php
 */

require_once "./UserRequest.php";

session_start();
$user_request = $_SESSION['user_request'];
$dbname = 'contact';
$host = 'other-lamplessons_mysql_1';
$dsn = 'mysql:dbname='.$dbname.';host='.$host;
$user = 'root';
$password = 'password';

try{
    $dbh = new PDO($dsn, $user, $password);
    $stmt = $dbh->prepare(
        "INSERT INTO detail (name,furigana,email,tel,sex_id,item_id,content) VALUES (:name,:furigana,:email,:tel,:sex_id,:item_id,:content)");
    $stmt->bindValue(
        ':name',
        $user_request->getName(),
        PDO::PARAM_STR
    );
    $stmt->bindValue(
        ':furigana',
        $user_request->getFurigana(),
        PDO::PARAM_STR
    );
    $stmt->bindValue(
        ':email',
        $user_request->getEmail(),
        PDO::PARAM_STR
    );
    $stmt->bindValue(
        ':tel',
        $user_request->getTel(),
        PDO::PARAM_STR
    );
    $stmt->bindValue(
        ':sex_id',
        $user_request->getSexId(),
        PDO::PARAM_INT
    );
    $stmt->bindValue(
        ':item_id',
        $user_request->getItemId(),
        PDO::PARAM_INT
    );
    $stmt->bindValue(
        ':content',
        $user_request->getContent(),
        PDO::PARAM_STR
    );
    $stmt->execute();

}catch (PDOException $e){
    print('Connection failed:'.$e->getMessage());
    die();
}

if (is_null($user_request)) {
    unset($_SESSION['user_request']);
    header("Location: form_quiz_template.php");
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
