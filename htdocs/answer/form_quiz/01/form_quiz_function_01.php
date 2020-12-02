<?php

require_once "./UserRequest.php";

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

    if (is_null($user_request->getSex()) || $user_request->getSex() === '') {
        $error_messages[UserRequest::SEX] = '性別を入力してください';
    }

    if (is_null($user_request->getItem()) || $user_request->getItem() === '') {
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
            0 => '<input type="radio" name="sex" value="0" checked> 男性',
            1 => '<input type="radio" name="sex" value="1"> 女性',
            2 => '<input type="radio" name="sex" value="2"> 無回答',
        ],
        UserRequest::ITEM     => [
            0 => '<option value="" selected>お問い合わせ項目を選択してください</option>',
            1 => '<option value="ご質問・お問い合わせ">ご質問・お問い合わせ</option>',
            2 => '<option value="ご意見・ご感想">ご意見・ご感想</option>'
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
            0 => '<input type="radio" name="sex" value="0" checked> 男性',
            1 => '<input type="radio" name="sex" value="1"> 女性',
            2 => '<input type="radio" name="sex" value="2"> 無回答',
        ],
        UserRequest::ITEM     => [
            0 => '<option value="" selected>お問い合わせ項目を選択してください</option>',
            1 => '<option value="ご質問・お問い合わせ">ご質問・お問い合わせ</option>',
            2 => '<option value="ご意見・ご感想">ご意見・ご感想</option>'
        ],
        UserRequest::CONTENT  => '<textarea name="content" rows="5" placeholder="お問合せ内容を入力">' . $user_request->getContent() . '</textarea>',
    ];

    if ($user_request->getSex() == 0) {
        $tags[UserRequest::SEX][0] = '<input type="radio" name="sex" value="0" checked> 男性';
    } else if ($user_request->getSex() == 1) {
        $tags[UserRequest::SEX][1] = '<input type="radio" name="sex" value="1" checked> 女性';
    } else if ($user_request->getSex() == 2) {
        $tags[UserRequest::SEX][2] = '<input type="radio" name="sex" value="2" checked> 無回答';
    }

    if ($user_request->getItem() == '') {
        $tags[UserRequest::ITEM][0] = '<option value="" selected>お問い合わせ項目を選択してください</option>';
    } else if ($user_request->getItem() == 'ご質問・お問い合わせ') {
        $tags[UserRequest::ITEM][1] = '<option value="ご質問・お問い合わせ" selected>ご質問・お問い合わせ</option>';
    } else if ($user_request->getItem() == 'ご意見・ご感想') {
        $tags[UserRequest::ITEM][2] = '<option value="ご意見・ご感想" selected>ご意見・ご感想</option>';
    }

    return $tags;
}
