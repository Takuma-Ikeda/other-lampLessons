<?php

require_once "./vendor_machine_quiz_class_04.php";

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

function calcChange($vendor_machine) {

    $money  = $vendor_machine->getMoney();
    $change = $vendor_machine->getChange();

    // 投入したお金が存在する場合
    if (!is_null($money) && !empty($money)) {
        // 預り金が存在する場合、それと足し算して「預り金」を表示する
        if (!is_null($change) && !empty($change)) {
            $money      = (int) $money;
            $old_change = (int) $change;
            $new_change = $money + $old_change;
            $vendor_machine->setChange($new_change);
        // 預り金が存在しない場合、投入したお金を「預り金」として表示する
        } else {
            $vendor_machine->setChange($money);
        }
    }

    $change = $vendor_machine->getChange();

    $vendor_machine->setChangeTag('<input class="change" type="text" name="' . $vendor_machine::CHANGE . '" size="10" maxlength="5" placeholder="預り金" value="' . $change . '" disabled>');
    $vendor_machine->setHiddenChangeTag('<input class="change" type="text" name="' . $vendor_machine::CHANGE . '" size="10" maxlength="5" placeholder="預り金" value="' . $change . '" hidden>');
    return $vendor_machine;
}
