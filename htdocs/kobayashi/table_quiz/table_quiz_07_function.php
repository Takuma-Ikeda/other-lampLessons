<?php

namespace quiz7;
/*
 * [ブラウザ]
 * http://localhost/answer/table_quiz/table_quiz_06.php
 * [コンテナパス]
 * /var/www/html/answer/table_quiz
 *  php table_quiz_06.php で実行可能
 */

 // 定数
const ERROR = 'ERROR';

function getStudentsByIds($ids) {

    $students = [
        createStudentData(1, '池田', 0, 0, 0, 0, 0, 100),
        createStudentData(2, '斉藤', 80, 80, 80, 80, 80, 80),
        createStudentData(3, '大塚', 100, 70, 90, 70, 60, 80),
        createStudentData(4, '小林', 70, 60, 80, 100, 60, 80)
    ];

    $result = [];

    foreach ($ids as $id) {
        /*
         * array_column
         * 指定した key だけを持った配列に変換する
         *
         * array_search
         * 指定した値が存在しない場合は false (boolean) を取得する
         * 指定した値が存在する場合は配列の index (int) を取得する
         */
        $index = array_search($id, array_column($students, 'id'));

        // id が存在しない場合、エラー配列を返す
        if (gettype($index) == 'boolean') {
            if (($index == false)) {
                $result[] = createStudentData($id, ERROR, ERROR, ERROR, ERROR, ERROR, ERROR, ERROR);
            }
        } else {
            $result[] = $students[$index];
        }
    }
    return $result;
}

// 配列の要素を返却する関数
function createStudentData($id, $name, $japanese, $math, $society, $science, $english, $programming) {
    return ['id' => $id, 'name' => $name, 'japanese' => $japanese, 'math' => $math, 'society' => $society, 'science' => $science, 'english' => $english, 'programming' => $programming];
}

// 好きな id を配列で渡すことができる
// $students = getStudentsByIds([1, 2, 3, 4]);

// 存在しない id を渡すと ERROR になる
$students = getStudentsByIds([1, 2, 3, 99]);
?>