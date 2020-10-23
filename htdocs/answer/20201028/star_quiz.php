<?php

/*
 * [ブラウザ]
 * http://localhost/answer/20201028/star_quiz.php
 * [コンテナパス]
 * /var/www/html/answer/20201028/star_quiz.php
 *  php star_quiz.php で実行可能
 */

 // グローバル変数
$isBrowser = true;

function problem01() {
    printNewLine('■problem01');
    $str = "";
    for ($i = 0; $i < 5; $i++) {
        $str .= "★";
    }
    printNewLine($str);
    printDotLine();
}

function problem02() {
    printNewLine('■problem02');
    $str = "";
    for ($i = 0; $i < 5; $i++) {
        if ($i % 2 == 0) {
            $str .= "★";
        } else if ($i % 2 == 1) {
            $str .= "☆";
        }

    }
    printNewLine($str);
    printDotLine();
}

function problem03() {
    printNewLine('■problem03');
    for ($i = 0; $i < 10; $i++) {
        $str = "";
        for ($j = 0; $j < 5; $j++) {
            $str .= "★";
        }
        printNewLine($str);
    }
    printDotLine();
}

function problem04() {
    printNewLine('■problem04');
    for ($i = 0; $i < 10; $i++) {
        $str = "";
        for ($j = 0; $j < 5; $j++) {
            if ($i % 2 == 0) {
                if ($j % 2 == 0) {
                    $str .= "★";
                } else if ($j % 2 == 1) {
                    $str .= "☆";
                }
            } else if ($i % 2 == 1) {
                if ($j % 2 == 0) {
                    $str .= "☆";
                } else if ($j % 2 == 1) {
                    $str .= "★";
                }
            }
        }
        printNewLine($str);
    }
    printDotLine();
}

function problem05() {
    printNewLine('■problem05');
    for ($i = 0; $i < 5; $i++) {
        $str = "";
        for ($j = 0; $j <= $i; $j++) {
            $str .= "★";
        }
        printNewLine($str);
    }
    printDotLine();
}

function problem06() {
    printNewLine('■problem06');
    for ($i = 5; $i > 0; $i--) {
        $str = "";
        for ($j = 0; $j < $i; $j++) {
            $str .= "★";
        }
        printNewLine($str);
    }
    printDotLine();
}

/*
 * 改行コードを挿入して文字列を出力する
 * ブラウザで表示する場合は <br /> タグに変換する
 */
function printNewLine($str) {
    global $isBrowser;
    if ($isBrowser) {
        echo nl2br($str . PHP_EOL);
    } else {
        echo $str . PHP_EOL;
    }
}

/*
 * 改行コードを挿入して点線を出力する
 * ブラウザで表示する場合は <br /> タグに変換する
 */
function printDotLine() {
    global $isBrowser;
    if ($isBrowser) {
        echo nl2br("------------------------------------" . PHP_EOL);
    } else {
        echo "------------------------------------" . PHP_EOL;
    }
}

/*
 * 実行
 */
problem01();
problem02();
problem03();
problem04();
problem05();
problem06();
