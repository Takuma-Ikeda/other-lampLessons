<?php

require "./table_quiz_08_function.php";

/*
 * このファイルは関数を実行するだけ
 */

// リクエストで (チェックボックスの name である) ids を受けとった場合
if (isset($_POST['ids'])) {
    foreach ($_POST['ids'] as $id) {
        // 送られてきた (チェックボックスの value である) id を保存する
        $ids[] = $id;
    }
    // id を元に結果を作成する
    $students = quiz8\getStudentsByIds($ids);
    // id を元にチェックボックスを作成する
    $checkbox = quiz8\getCheckbox($ids);
} else {
    $students = quiz8\getStudentsByIds();
    $checkbox = quiz8\getCheckbox();
}
