<?php

namespace util;

const ERROR = 'ERROR';
const STUDENT_NUM = 10;

// 引数 $ids にデフォルト値 (空っぽの配列) を設定
function getStudentsByIds($ids = []) {

    $students = [
        createStudentData(1, '池田', 0, 0, 0, 0, 0, 100),
        createStudentData(2, '斉藤', 80, 80, 80, 80, 80, 80),
        createStudentData(3, '大塚', 100, 70, 90, 70, 60, 80),
        createStudentData(4, '小林', 70, 60, 80, 100, 60, 80)
    ];

    // STUDENT_NUM の数値をもとに $students 対してダミーデータを追加する
    for ($i = count($students) + 1; $i <= STUDENT_NUM; $i++) {
        $students[] = createStudentData($i, 'ダミーデータ', mt_rand(0, 100), mt_rand(0, 100), mt_rand(0, 100), mt_rand(0, 100), mt_rand(0, 100), mt_rand(0, 100));
    }

    // 配列 $ids が空っぽだったら
    if (empty($ids)) {
        // 全件の $students を返す
        return $students;
    }

    $result = [];

    foreach ($ids as $id) {
        $index = array_search($id, array_column($students, 'id'));

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

function createStudentData($id, $name, $japanese, $math, $society, $science, $english, $programming) {
    return ['id' => $id, 'name' => $name, 'japanese' => $japanese, 'math' => $math, 'society' => $society, 'science' => $science, 'english' => $english, 'programming' => $programming];
}

// 引数 $ids にデフォルト値 (空っぽの配列) を設定
function getCheckbox($ids = []) {
    $result = [];
    // 生徒数を取得 ※ 生徒数とチェックボックスの個数は一致するため
    $num = count(getStudentsByIds());

    // input タグの value に生徒の id を仕込む
    for ($i = 1; $i <= $num; $i++) {
        // checked でチェックを保持する
        if (in_array($i, $ids)) {
            $result[] = '<input type="checkbox" name="ids[]" value="' . $i . '" checked>' . $i;
        } else {
            $result[] = '<input type="checkbox" name="ids[]" value="' . $i . '">' . $i;
        }
    }
    return $result;
}
