<?php

require_once "./UserRequest.php";

// docker-compose ps で表示されるコンテナ名
const HOST     = 'other-lamplessons_mysql_1';
const DB       = 'contact';
const USER     = 'root';
const PASSWORD = 'password';
const CHARSET  = 'utf8';
const DSN      = 'mysql:dbname=' . DB . ';host=' . HOST .';charset=' . CHARSET;

/**
* バリデーションを行う。エラーが見つかれば、配列にエラーメッセージを設定して返却する
* @param UserRequest $user_request
* @return array $error_messages
*/
function validation($user_request) {

    $error_messages = [];

    if (is_null($user_request->getName()) || $user_request->getName() === '') {
        $error_messages[UserRequest::NAME] = '氏名を入力してください';
    }

    if (is_null($user_request->getFurigana()) || $user_request->getFurigana() === '') {
        $error_messages[UserRequest::FURIGANA] = 'ふりがなを入力してください';
    }

    if (is_null($user_request->getEmail()) || $user_request->getEmail() === '') {
        $error_messages[UserRequest::EMAIL] = 'メールアドレスを入力してください';
    }

    if (is_null($user_request->getTel()) || $user_request->getTel() === '') {
        $error_messages[UserRequest::TEL] = '電話番号を入力してください';
    }

    if (is_null($user_request->getSexId()) || $user_request->getSexId() === '') {
        $error_messages[UserRequest::SEX] = '性別を入力してください';
    }

    if (is_null($user_request->getItemId()) || $user_request->getItemId() === '') {
        $error_messages[UserRequest::ITEM] = 'お問い合わせ項目を選択してください';
    }

    if (is_null($user_request->getContent()) || $user_request->getContent() === '') {
        $error_messages[UserRequest::CONTENT] = 'お問い合わせ内容を入力してください';
    }

    if (!preg_match("/\A([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+\z/", $user_request->getEmail())) {
        $error_messages[UserRequest::EMAIL] = 'メールアドレスを正しい形式で入力してください';
    }

    if (!preg_match("/^(0{1}\d{1,4}-{0,1}\d{1,4}-{0,1}\d{4})$/", $user_request->getTel())) {
        $error_messages[UserRequest::TEL] = '電話番号を正しい形式で入力してください';
    }

    return $error_messages;
}

/**
* エラーメッセージが存在する場合、HTML タグにエラーメッセージを埋め込んで返却する
* @param array $msgs | null
* @return array $tags
*/
function createErrorTags($msgs) {

    // 初期値
    $tags = [
        UserRequest::NAME     => '<div class="error"></div>',
        UserRequest::FURIGANA => '<div class="error"></div>',
        UserRequest::EMAIL    => '<div class="error"></div>',
        UserRequest::TEL      => '<div class="error"></div>',
        UserRequest::SEX      => '<div class="error"></div>',
        UserRequest::ITEM     => '<div class="error"></div>',
        UserRequest::CONTENT  => '<div class="error"></div>',
    ];

    // $msgs が null だったら初期値を返す
    if (is_null($msgs)) {
        return $tags;
    }

    foreach ($msgs as $key => $value) {
        if (!is_null($value) || $value !== '') {
            $tags[$key] = '<div class="error">' . $value . '</div>';
        }
    }
    return $tags;
}

/**
* HTML タグにリクエストの値を埋め込んで返却する
* @param array $user_request | null
* @return array $tags
*/
function createValueTags($user_request) {

    // 初期値
    $tags = [
        UserRequest::NAME     => '<input type="text" name="name" placeholder="例）山田太郎" value="">',
        UserRequest::FURIGANA => '<input type="text" name="furigana" placeholder="例）やまだたろう" value="">',
        UserRequest::EMAIL    => '<input type="text" name="email" placeholder="例）guest@example.com" value="">',
        UserRequest::TEL      => '<input type="text" name="tel" placeholder="例）000-0000-0000" value="">',
        UserRequest::SEX      => [
            0 => '<input type="radio" name="sex_id" value="1" checked> 男性',
            1 => '<input type="radio" name="sex_id" value="2"> 女性',
            2 => '<input type="radio" name="sex_id" value="3"> 無回答',
        ],
        UserRequest::ITEM     => [
            0 => '<option value="" selected>お問い合わせ項目を選択してください</option>',
            1 => '<option value="1">ご質問・お問い合わせ</option>',
            2 => '<option value="2">ご意見・ご感想</option>'
        ],
        UserRequest::CONTENT  => '<textarea name="content" rows="5" placeholder="お問合せ内容を入力"></textarea>',
    ];

    // $user_request が null だったら初期値を返す
    if (is_null($user_request)) {
        return $tags;
    }

    $tags = [
        UserRequest::NAME     => '<input type="text" name="name" placeholder="例）山田太郎" value="' . $user_request->getName() . '">',
        UserRequest::FURIGANA => '<input type="text" name="furigana" placeholder="例）やまだたろう" value="' . $user_request->getFurigana() . '">',
        UserRequest::EMAIL    => '<input type="text" name="email" placeholder="例）guest@example.com" value="' . $user_request->getEmail() . '">',
        UserRequest::TEL      => '<input type="text" name="tel" placeholder="例）000-0000-0000" value="' . $user_request->getTel() . '">',
        UserRequest::SEX      => [
            0 => '<input type="radio" name="sex_id" value="1" checked> 男性',
            1 => '<input type="radio" name="sex_id" value="2"> 女性',
            2 => '<input type="radio" name="sex_id" value="3"> 無回答',
        ],
        UserRequest::ITEM     => [
            0 => '<option value="" selected>お問い合わせ項目を選択してください</option>',
            1 => '<option value="1">ご質問・お問い合わせ</option>',
            2 => '<option value="2">ご意見・ご感想</option>'
        ],
        UserRequest::CONTENT  => '<textarea name="content" rows="5" placeholder="お問合せ内容を入力">' . $user_request->getContent() . '</textarea>',
    ];

    if ($user_request->getSexId() == 1) {
        $tags[UserRequest::SEX][0] = '<input type="radio" name="sex_id" value="1" checked> 男性';
    } else if ($user_request->getSexId() == 2) {
        $tags[UserRequest::SEX][0] = '<input type="radio" name="sex_id" value="1"> 男性';
        $tags[UserRequest::SEX][1] = '<input type="radio" name="sex_id" value="2" checked> 女性';
    } else if ($user_request->getSexId() == 3) {
        $tags[UserRequest::SEX][0] = '<input type="radio" name="sex_id" value="1"> 男性';
        $tags[UserRequest::SEX][2] = '<input type="radio" name="sex_id" value="3" checked> 無回答';
    }

    if ($user_request->getItemId() == '') {
        $tags[UserRequest::ITEM][0] = '<option value="" selected>お問い合わせ項目を選択してください</option>';
    } else if ($user_request->getItemId() == 1) {
        $tags[UserRequest::ITEM][0] = '<option value="">お問い合わせ項目を選択してください</option>';
        $tags[UserRequest::ITEM][1] = '<option value="1" selected>ご質問・お問い合わせ</option>';
    } else if ($user_request->getItemId() == 2) {
        $tags[UserRequest::ITEM][0] = '<option value="">お問い合わせ項目を選択してください</option>';
        $tags[UserRequest::ITEM][2] = '<option value="2" selected>ご意見・ご感想</option>';
    }

    return $tags;
}

/**
* detail テーブルにレコード追加する
* @param UserRequest $user_request
* @return void
*/
function insertDetail($user_request) {
    try {
        $pdo = new PDO(DSN, USER, PASSWORD);
        $sql = 'INSERT INTO detail (name, furigana, email, tel, sex_id, item_id, content) VALUE (:name, :furigana, :email, :tel, :sex_id, :item_id, :content)';
        $stmt = $pdo->prepare($sql);
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
    } catch (PDOException $e) {
        echo "データベースエラー: " . $e->getMessage() . PHP_EOL;
        exit();
    }
}

/**
* detail テーブルのレコードを全件返却する
* @return array
*/
function selectDetails() {
    try {
        $pdo = new PDO(DSN, USER, PASSWORD);
        $sql = 'SELECT detail.id, detail.name, detail.furigana, detail.email, detail.tel, sex.sex, item.item, detail.content, detail.created, detail.updated FROM detail LEFT JOIN sex ON detail.sex_id = sex.id LEFT JOIN item ON detail.item_id = item.id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "データベースエラー: " . $e->getMessage() . PHP_EOL;
        exit();
    }
}
