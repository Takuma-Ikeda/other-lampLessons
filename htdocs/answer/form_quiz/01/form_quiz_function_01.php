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
* @param array $msgs
* @return array $tags
*/
function createErrorTags($msgs) {

    $tags = [
        UserRequest::NAME     => '<div class="error"></div>',
        UserRequest::FURIGANA => '<div class="error"></div>',
        UserRequest::EMAIL    => '<div class="error"></div>',
        UserRequest::TEL      => '<div class="error"></div>',
        UserRequest::SEX      => '<div class="error"></div>',
        UserRequest::ITEM     => '<div class="error"></div>',
        UserRequest::CONTENT  => '<div class="error"></div>',
    ];

    foreach ($msgs as $key => $value) {
        if (!is_null($value) || $value !== '') {
            $tags[$key] = '<div class="error">' . $value . '</div>';
        }
    }
    return $tags;
}
