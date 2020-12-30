<?php

require_once "./UserRequest.php";

// docker-compose ps で表示されるコンテナ名
const HOST              = 'other-lamplessons_mysql_1';
const DB                = 'contact';
const USER              = 'root';
const PASSWORD          = 'password';
const CHARSET           = 'utf8';
const DSN               = 'mysql:dbname=' . DB . ';host=' . HOST .';charset=' . CHARSET;
const DISPLAY_ROW_COUNT = 10;

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
* ナビゲーションリンクの HTML タグを返却する
* @param int $max_page
* @param int $page
* @return array $tags
*/
function createNavLinksTags($max_page, $current_page = 1) {
    $tags = [];

    // 1 ページ目
    if ($current_page == 1) {
        $tags[] = createPrevPageNumbersTag(1);
        $tags[] = createPageNumbersCurrentTag($current_page);
        if ($max_page == 2) {
            $tags[] = createPageNumbersTag($current_page + 1);
        } else if ($max_page == 3) {
            $tags[] = createPageNumbersTag($current_page + 1);
            $tags[] = createPageNumbersTag($current_page + 2);
        } else if ($max_page == 4) {
            $tags[] = createPageNumbersTag($current_page + 1);
            $tags[] = createPageNumbersTag($current_page + 2);
            $tags[] = createPageNumbersTag($current_page + 3);
        } else if ($max_page == 5) {
            $tags[] = createPageNumbersTag($current_page + 1);
            $tags[] = createPageNumbersTag($current_page + 2);
            $tags[] = createPageNumbersTag($current_page + 3);
            $tags[] = createPageNumbersTag($current_page + 4);
        } else if ($max_page >= 6) {
            $tags[] = createPageNumbersTag($current_page + 1);
            $tags[] = createPageNumbersTag($current_page + 2);
            $tags[] = createPageNumbersDotsTag();
            $tags[] = createPageNumbersAfterDotsTag($max_page, $current_page);
        }
        $tags[] = createNextPageNumbersTag($max_page);
        return $tags;
    }

    if (($max_page - $current_page) > 2) {
        $tags[] = createPrevPageNumbersTag(1);
        $tags[] = createPageNumbersTag($current_page - 1);
        $tags[] = createPageNumbersCurrentTag($current_page);
        if ($max_page == 3) {
            $tags[] = createPageNumbersTag($current_page + 1);
        } else if ($max_page == 4) {
            $tags[] = createPageNumbersTag($current_page + 1);
            $tags[] = createPageNumbersTag($current_page + 2);
        } else if ($max_page == 5) {
            $tags[] = createPageNumbersTag($current_page + 1);
            $tags[] = createPageNumbersTag($current_page + 2);
            $tags[] = createPageNumbersTag($current_page + 3);
        } else if ($max_page >= 6) {
            $tags[] = createPageNumbersTag($current_page + 1);
            if (($current_page == 3) && ($max_page == 5)) {
                array_splice($tags, 1, 0, createPageNumbersTag(1));
            } else {
                $tags[] = createPageNumbersDotsTag();
            }
            $tags[] = createPageNumbersAfterDotsTag($max_page, $current_page);
        }
        $tags[] = createNextPageNumbersTag($max_page);
    // 後ろから 2 ページ以内
    } else {
        // ページネションが 6 未満の場合
        if ($max_page < 6) {
            $tags[] = createPrevPageNumbersTag(1);
            $tags[] = createPageNumbersTag($current_page - 1);
            $tags[] = createPageNumbersCurrentTag($current_page);
            if ($max_page == 3) {
                if ($current_page == 3) {
                    array_splice($tags, 1, 0, createPageNumbersTag(1));
                } else {
                    $tags[] = createPageNumbersTag($current_page + 1);
                }
            } else if ($max_page == 4) {
                if ($current_page == 3) {
                    array_splice($tags, 1, 0, createPageNumbersTag(1));
                    $tags[] = createPageNumbersTag($current_page + 1);
                } else if ($current_page == 4) {
                    array_splice($tags, 1, 0, createPageNumbersTag(1));
                    array_splice($tags, 2, 0, createPageNumbersTag(2));
                } else {
                    $tags[] = createPageNumbersTag($current_page + 1);
                    $tags[] = createPageNumbersTag($current_page + 2);
                }
            } else if ($max_page == 5) {
                if ($current_page == 3) {
                    array_splice($tags, 1, 0, createPageNumbersTag(1));
                    $tags[] = createPageNumbersTag($current_page + 1);
                    $tags[] = createPageNumbersTag($current_page + 2);
                } else if ($current_page == 4) {
                    array_splice($tags, 1, 0, createPageNumbersTag(1));
                    array_splice($tags, 2, 0, createPageNumbersTag(2));
                    $tags[] = createPageNumbersTag($current_page + 1);
                } else if ($current_page == 5) {
                    array_splice($tags, 1, 0, createPageNumbersTag(1));
                    array_splice($tags, 2, 0, createPageNumbersTag(2));
                    array_splice($tags, 3, 0, createPageNumbersTag(3));
                } else {
                    $tags[] = createPageNumbersTag($current_page + 1);
                    $tags[] = createPageNumbersTag($current_page + 2);
                }
            }
            $tags[] = createNextPageNumbersTag($max_page);
        // ページネションが 6 以上の場合
        } else {
            $tags[] = createPrevPageNumbersTag(1);
            $tags[] = createPageNumbersBeforeDotsTag($max_page, $current_page);
            $tags[] = createPageNumbersDotsTag();
            // 最終ページ
            if ($current_page >= $max_page) {
                $tags[] = createPageNumbersTag($current_page - 2);
                $tags[] = createPageNumbersTag($current_page - 1);
                $tags[] = createPageNumbersCurrentTag($current_page);
            // 後ろから 2 ページ以内だが、最終ページではない
            } else {
                $tags[] = createPageNumbersTag($current_page - 1);
                $tags[] = createPageNumbersCurrentTag($current_page);
                $tags[] = createPageNumbersTag($current_page + 1);
            }
            $tags[] = createNextPageNumbersTag($max_page);
        }
    }
    return $tags;
}

function createPrevPageNumbersTag($first_page) {
    return '<a class="prev page-numbers" href="./form_quiz_template_admin.php?p=' . $first_page .'">«</a>';
}

function createNextPageNumbersTag($last_page) {
    return '<a class="next page-numbers" href="./form_quiz_template_admin.php?p=' . $last_page . '">»</a>';
}

function createPageNumbersTag($page) {
    return '<a class="page-numbers" href="./form_quiz_template_admin.php?p=' . $page . '">' . $page . '</a>';
}

function createPageNumbersCurrentTag($page) {
    return '<span class="page-numbers current">' . $page . '</span>';
}

function createPageNumbersDotsTag() {
    return '<span class="page-numbers dots">…</span>';
}

function createPageNumbersAfterDotsTag($max_page, $current_page) {
    $page = 0;
    if (($max_page - $current_page) < 10) {
        $page = ($max_page - $current_page) + $current_page;
    } else {
        $page = $current_page + 10;
    }
    return '<a class="page-numbers" href="./form_quiz_template_admin.php?p=' . $page . '">' . $page . '</a>';
}

function createPageNumbersBeforeDotsTag($max_page, $current_page) {
    $page = 0;
    if (($current_page - 10) < 0) {
        $page = 1;
    } else {
        $page = $current_page - 10;
    }
    return '<a class="page-numbers" href="./form_quiz_template_admin.php?p=' . $page . '">' . $page . '</a>';
}

/**
* ページネーション数を返却する
* @param int $rows_count
* @return int
*/
function getpaginationCount($rows_count) {
    $count = floor($rows_count / DISPLAY_ROW_COUNT);
    if (($rows_count % DISPLAY_ROW_COUNT) != 0) {
        $count += 1;
    }
    return $count;
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
* 最新順に detail テーブルのレコードを 10 件返却する
* @param int $page
* @return array
*/
function selectDetails($page = 1) {
    try {
        $pdo = new PDO(DSN, USER, PASSWORD);
        $offset = ($page * DISPLAY_ROW_COUNT) - DISPLAY_ROW_COUNT;
        $sql = 'SELECT detail.id, detail.name, detail.furigana, detail.email, detail.tel, sex.sex, item.item, detail.content, detail.created, detail.updated FROM detail LEFT JOIN sex ON detail.sex_id = sex.id LEFT JOIN item ON detail.item_id = item.id ORDER BY detail.id DESC LIMIT 10 OFFSET ' . $offset;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "データベースエラー: " . $e->getMessage() . PHP_EOL;
        exit();
    }
}

/**
* $id を指定して detail テーブルのレコードを 1 件返却する
* @param int id
* @return array
*/
function selectDetailById($id) {
    try {
        $pdo = new PDO(DSN, USER, PASSWORD);
        $sql = 'SELECT * FROM detail WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(
            ':id',
            $id,
            PDO::PARAM_INT
        );
        $stmt->execute();
        return $stmt->fetch();
    } catch (PDOException $e) {
        echo "データベースエラー: " . $e->getMessage() . PHP_EOL;
        exit();
    }
}

/**
* detail テーブルのレコードを 1 件更新する
* @param int $id
* @param UserRequest $user_request
* @return void
*/
function updateDetailById($id, $user_request) {
    try {
        $pdo = new PDO(DSN, USER, PASSWORD);
        $sql = 'UPDATE detail SET name = :name, furigana = :furigana, email = :email, tel = :tel, sex_id = :sex_id, item_id = :item_id, content = :content WHERE id = :id';
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
        $stmt->bindValue(
            ':id',
            $id,
            PDO::PARAM_INT
        );
        $stmt->execute();
    } catch (PDOException $e) {
        echo "データベースエラー: " . $e->getMessage() . PHP_EOL;
        exit();
    }
}

/**
* detail テーブルのレコードを 1 件削除する
* @param int $id
* @return void
*/
function deleteDetailById($id) {
    try {
        $pdo = new PDO(DSN, USER, PASSWORD);
        $sql = 'DELETE FROM detail WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(
            ':id',
            $id,
            PDO::PARAM_INT
        );
        $stmt->execute();
    } catch (PDOException $e) {
        echo "データベースエラー: " . $e->getMessage() . PHP_EOL;
        exit();
    }
}

/**
* detail テーブルのレコード件数を返却する
* @return int
*/
function countDetail() {
    try {
        $pdo = new PDO(DSN, USER, PASSWORD);
        $sql = 'SELECT COUNT(*) FROM detail';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return (int) $stmt->fetchColumn();
    } catch (PDOException $e) {
        echo "データベースエラー: " . $e->getMessage() . PHP_EOL;
        exit();
    }
}
