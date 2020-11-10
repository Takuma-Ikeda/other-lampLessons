<?php

const DRINK_ID      = 1;
const ICE_ID        = 2;
const TABACCO_ID    = 3;
const NEWS_PAPER_ID = 4;

/*
 * お釣りの初期値
 */
$drink_change      = 0;
$ice_change        = 0;
$tabacco_change    = 0;
$news_paper_change = 0;

if (count($_POST) != 0) {
    // 投入したお金をお釣りとして設定する
    if (isset($_POST['drink_money']) && !empty($_POST['drink_money'])) {
        $drink_change = $_POST['drink_money'];
        $drink_change_tag = getChangeTag(DRINK_ID, $drink_change);
    } else {
        $drink_change_tag = getChangeTag(DRINK_ID, $drink_change, true);
    }
    if (isset($_POST['ice_money']) && !empty($_POST['ice_money'])) {
        $ice_change = $_POST['ice_money'];
        $ice_change_tag = getChangeTag(ICE_ID, $ice_change);
    } else {
        $ice_change_tag = getChangeTag(ICE_ID, $ice_change, true);
    }
    if (isset($_POST['tabacco_money']) && !empty($_POST['tabacco_money'])) {
        $tabacco_change = $_POST['tabacco_money'];
        $tabacco_change_tag = getChangeTag(TABACCO_ID, $tabacco_change);
    } else {
        $tabacco_change_tag = getChangeTag(TABACCO_ID, $tabacco_change, true);
    }
    if (isset($_POST['news_paper_money']) && !empty($_POST['news_paper_money'])) {
        $news_paper_change = $_POST['news_paper_money'];
        $news_paper_change_tag = getChangeTag(NEWS_PAPER_ID, $news_paper_change);
    } else {
        $news_paper_change_tag = getChangeTag(NEWS_PAPER_ID, $news_paper_change, true);
    }
// 初期画面
} else {
    // お釣りを非活性にする
    $drink_change_tag      = getChangeTag(DRINK_ID, $drink_change);
    $ice_change_tag        = getChangeTag(ICE_ID, $ice_change);
    $tabacco_change_tag    = getChangeTag(TABACCO_ID, $tabacco_change);
    $news_paper_change_tag = getChangeTag(NEWS_PAPER_ID, $news_paper_change);
}


function getChangeTag($id, $change) {
    switch ($id) {
        case DRINK_ID:
            $name = 'drink_change';
            break;
        case ICE_ID:
            $name = 'ice_change';
            break;
        case TABACCO_ID:
            $name = 'tabacco_change';
            break;
        case NEWS_PAPER_ID:
            $name = 'news_papaer_change';
            break;
    }
    return '<input type="text" name="' . $name. '" size="10" maxlength="5" placeholder="お釣り" value="' . $change . '" disabled>';
}


function getUserRequest($req) {

    $user_request = new UserRequest();

    $user_request->setItemName($req['item_name']);
    $user_request->setDrinkMoney($req['drink_money']);
    $user_request->setDrinkChange($req['drink_change']);
    $user_request->setIceMoney($req['ice_money']);
    $user_request->setIceChange($req['ice_change']);
    $user_request->setTabaccoMoney($req['tabacco_money']);
    $user_request->setTabaccoChange($req['tabacco_change']);
    $user_request->setNewsPaperMoney($req['news_paper_money']);
    $user_request->setNewsPaperChange($req['news_paper_change']);

    return $user_request;
}
