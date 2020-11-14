<?php

require_once "./vendor_machine_quiz_class_05.php";

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

    if (is_null($req[DrinkVendorMachine::RECEIVE_CHANGE]) && empty($req[DrinkVendorMachine::RECEIVE_CHANGE])) {
        $user_request->setIsReceiveDrinkChange(false);
    } else {
        $user_request->setIsReceiveDrinkChange((bool) $req[DrinkVendorMachine::RECEIVE_CHANGE]);
    }

    if (is_null($req[IceVendorMachine::RECEIVE_CHANGE]) && empty($req[IceVendorMachine::RECEIVE_CHANGE])) {
        $user_request->setIsReceiveIceChange(false);
    } else {
        $user_request->setIsReceiveIceChange((bool) $req[IceVendorMachine::RECEIVE_CHANGE]);
    }

    if (is_null($req[TabaccoVendorMachine::RECEIVE_CHANGE]) && empty($req[TabaccoVendorMachine::RECEIVE_CHANGE])) {
        $user_request->setIsReceiveTabaccoChange(false);
    } else {
        $user_request->setIsReceiveTabaccoChange((bool) $req[TabaccoVendorMachine::RECEIVE_CHANGE]);
    }

    if (is_null($req[NewsPaperVendorMachine::RECEIVE_CHANGE]) && empty($req[NewsPaperVendorMachine::RECEIVE_CHANGE])) {
        $user_request->setIsReceiveNewsPaperChange(false);
    } else {
        $user_request->setIsReceiveNewsPaperChange((bool) $req[NewsPaperVendorMachine::RECEIVE_CHANGE]);
    }

    return $user_request;
}

function calcChange($vendor_machine, $name) {

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

    // お釣りボタンが押された場合
    if ($vendor_machine->getIsRecieveChange()) {
        $vendor_machine->setMessage($vendor_machine->getChange() . '円のお釣りを返しました');
        $vendor_machine->setChange(0);
    }

    $change = $vendor_machine->getChange();

    $vendor_machine->setChangeTag('<input class="change" type="text" name="' . $name . '" size="10" maxlength="5" placeholder="預り金" value="' . $change . '" disabled>');
    $vendor_machine->setHiddenChangeTag('<input class="change" type="text" name="' . $name . '" size="10" maxlength="5" placeholder="預り金" value="' . $change . '" hidden>');
    return $vendor_machine;
}

function switchReceiveChangeTag($vendor_machine, $name) {

    $change = $vendor_machine->getChange();
    $value = 0;

    // 預り金がないとき
    if (is_null($change) || empty($change)) {
        $vendor_machine->setRecieveChangeTag('<button type="submit" value="' . $value . '" name="' . $name . '" disabled>お釣り</button>');
    // 預り金があるとき
    } else {
        // 0 円より大きいときは活性化する
        if ((int) $change > 0) {
            $value = 1;
            $vendor_machine->setRecieveChangeTag('<button type="submit" value="' . $value . '" name="' . $name . '">お釣り</button>');
        } else {
            $vendor_machine->setRecieveChangeTag('<button type="submit" value="' . $value . '" name="' . $name . '" disabled>お釣り</button>');
        }
    }
    return $vendor_machine;
}

function chooseMessage($drink, $ice, $tabacco, $news_paper) {
    if (!is_null($drink->getMessage()) && !empty($drink->getMessage())) {
        return $drink->getMessage();
    }

    if (!is_null($ice->getMessage()) && !empty($ice->getMessage())) {
        return $ice->getMessage();
    }

    if (!is_null($tabacco->getMessage()) && !empty($tabacco->getMessage())) {
        return $tabacco->getMessage();
    }

    if (!is_null($news_paper->getMessage()) && !empty($news_paper->getMessage())) {
        return $news_paper->getMessage();
    }
    return '';
}
