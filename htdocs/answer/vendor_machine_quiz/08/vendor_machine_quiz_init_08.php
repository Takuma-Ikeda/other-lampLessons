<?php

/**
 * vendor_machine_quiz_template_08.php で利用する変数を初期化する
 *
 * @author Takuma Ikeda <eeeeg.takuma.ikeda@gmail.com>
 * @copyright Copyright © EeeeG, Inc.
 */

require_once dirname(__FILE__) . "/class/DrinkVendorMachine.php";
require_once dirname(__FILE__) . "/class/IceVendorMachine.php";
require_once dirname(__FILE__) . "/class/TabaccoVendorMachine.php";
require_once dirname(__FILE__) . "/class/NewsPaperVendorMachine.php";
require_once dirname(__FILE__) . "/vendor_machine_quiz_init_08.php";
require_once dirname(__FILE__) . "/vendor_machine_quiz_function_08.php";

$user_request = getUserRequest($_POST);

$drink      = new DrinkVendorMachine($user_request);
$ice        = new IceVendorMachine($user_request);
$tabacco    = new TabaccoVendorMachine($user_request);
$news_paper = new NewsPaperVendorMachine($user_request);

try {
    isInt($drink->getMoney());
    $drink = calcChange($drink);
    $drink = switchReceiveChangeTag($drink);
    $drink = switchItemNameTag($drink);
} catch (NotIntgerException $e) {
    $drink = resetVendorMachine($drink, $e);
}

try {
    isInt($ice->getMoney());
    $ice = calcChange($ice);
    $ice = switchReceiveChangeTag($ice);
    $ice = switchItemNameTag($ice);
} catch (NotIntgerException $e) {
    $ice = resetVendorMachine($ice, $e);
}

try {
    isInt($tabacco->getMoney());
    $tabacco = calcChange($tabacco);
    $tabacco = switchReceiveChangeTag($tabacco);
    $tabacco = switchItemNameTag($tabacco);
} catch (NotIntgerException $e) {
    $tabacco = resetVendorMachine($tabacco, $e);
}

try {
    isInt($news_paper->getMoney());
    $news_paper = calcChange($news_paper);
    $news_paper = switchReceiveChangeTag($news_paper);
    $news_paper = switchItemNameTag($news_paper);
} catch (NotIntgerException $e) {
    $news_paper = resetVendorMachine($news_paper, $e);
}

$message = chooseMessage($drink, $ice, $tabacco, $news_paper);
