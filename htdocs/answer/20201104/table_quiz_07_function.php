<?php

function getStudentById($ids) {
    $students = [
        ['id' => 1, 'name' => '池田', 'japanese' => 0, 'math' => 0, 'society' => 0, 'science' => 0, 'english' => 0, 'programming' => 100],
        ['id' => 2, 'name' => '斉藤', 'japanese' => 80, 'math' => 80, 'society' => 80, 'science' => 80, 'english' => 80, 'programming' => 80],
        ['id' => 3, 'name' => '大塚', 'japanese' => 100, 'math' => 70, 'society' => 90, 'science' => 70, 'english' => 60, 'programming' => 80],
        ['id' => 4, 'name' => '小林', 'japanese' => 70, 'math' => 60, 'society' => 80, 'science' => 100, 'english' => 60, 'programming' => 80],
    ];

    $result = [];

    foreach ($ids as $id) {
        // id が存在する場合は配列の index (int) を取得する
        // id が存在しない場合は false (boolean) を取得する
        $index = array_search($id, array_column($students, 'id'));

        // id が存在しない場合、エラー配列を返す
        if (gettype($index) == 'boolean') {
            if (($index == false)) {
                $result[] = ['id' => $id, 'name' => 'ERROR', 'japanese' => 'ERROR', 'math' => 'ERROR', 'society' => 'ERROR', 'science' => 'ERROR', 'english' => 'ERROR', 'programming' => 'ERROR'];
            }
        } else {
            $result[] = $students[$index];
        }
    }
    return $result;
}
