<?php

namespace util;

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
