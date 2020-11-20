<?php

require_once "./vendor_machine_quiz_class_02.php";

function getUserRequest($req) {

    $user_request = new UserRequest();

    $user_request->setDrinkMoney($req[DrinkVendorMachine::MONEY]);
    $user_request->setDrinkChange($req[DrinkVendorMachine::CHANGE]);
    $user_request->setIceMoney($req[IceVendorMachine::MONEY]);
    $user_request->setIceChange($req[IceVendorMachine::CHANGE]);
    $user_request->setTabaccoMoney($req[TabaccoVendorMachine::MONEY]);
    $user_request->setTabaccoChange($req[TabaccoVendorMachine::CHANGE]);
    $user_request->setNewsPaperMoney($req[NewsPaperVendorMachine::MONEY]);
    $user_request->setNewsPaperChange($req[NewsPaperVendorMachine::CHANGE]);

    if (!is_null($req[DrinkVendorMachine::ITEM_NAME]) && !empty($req[DrinkVendorMachine::ITEM_NAME])) {
        $user_request->setDrinkItemName($req[DrinkVendorMachine::ITEM_NAME]);
    }

    if (!is_null($req[IceVendorMachine::ITEM_NAME]) && !empty($req[IceVendorMachine::ITEM_NAME])) {
        $user_request->setIceItemName($req[IceVendorMachine::ITEM_NAME]);
    }

    if (!is_null($req[TabaccoVendorMachine::ITEM_NAME]) && !empty($req[TabaccoVendorMachine::ITEM_NAME])) {
        $user_request->setTabaccoItemName($req[TabaccoVendorMachine::ITEM_NAME]);
    }

    if (!is_null($req[NewsPaperVendorMachine::ITEM_NAME]) && !empty($req[NewsPaperVendorMachine::ITEM_NAME])) {
        $user_request->setNewsPaperItemName($req[NewsPaperVendorMachine::ITEM_NAME]);
    }

    return $user_request;
}
