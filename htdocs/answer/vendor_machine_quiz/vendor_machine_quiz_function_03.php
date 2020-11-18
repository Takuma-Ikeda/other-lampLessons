<?php

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
