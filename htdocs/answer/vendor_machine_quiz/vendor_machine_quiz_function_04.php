<?php

require_once "./vendor_machine_quiz_class_04.php";

function getUserRequest($req) {

    $user_request = new UserRequest();

    $user_request->setItemName($req[VendorMachine::ITEM_NAME]);
    $user_request->setDrinkMoney($req[DrinkVendorMachine::MONEY]);
    $user_request->setDrinkChange($req[DrinkVendorMachine::CHANGE]);
    $user_request->setIceMoney($req[IceVendorMachine::MONEY]);
    $user_request->setIceChange($req[IceVendorMachine::CHANGE]);
    $user_request->setTabaccoMoney($req[TabaccoVendorMachine::MONEY]);
    $user_request->setTabaccoChange($req[TabaccoVendorMachine::CHANGE]);
    $user_request->setNewsPaperMoney($req[NewsPaperVendorMachine::MONEY]);
    $user_request->setNewsPaperChange($req[NewsPaperVendorMachine::CHANGE]);

    return $user_request;
}

function calcChange($vendor_machine, $type) {
    // 投入したお金が存在する場合
    if (!is_null($vendor_machine->getMoney()) && !empty($vendor_machine->getMoney())) {
        // 預り金が存在する場合、それと足し算して「預り金」を表示する
        if (!is_null($vendor_machine->getChange()) && !empty($vendor_machine->getChange())) {
            $money      = (int) $vendor_machine->getMoney();
            $old_change = (int) $vendor_machine->getChange();
            $new_change = $money + $old_change;
            $vendor_machine->createChangeTag($type, $new_change);
            $vendor_machine->createChangeTag($type, $new_change, true);
        // 預り金が存在しない場合、投入したお金を「預り金」として表示する
        } else {
            $vendor_machine->createChangeTag($type, $vendor_machine->getMoney());
            $vendor_machine->createChangeTag($type, $vendor_machine->getMoney(), true);
        }
    // 投入したお金が存在しない場合、現在の「預り金」を表示する
    } else {
        $vendor_machine->createChangeTag($type, $vendor_machine->getChange());
        $vendor_machine->createChangeTag($type, $vendor_machine->getChange(), true);
    }
    return $vendor_machine;
}
