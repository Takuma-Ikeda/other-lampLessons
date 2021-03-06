<?php

/**
 * 関数定義
 *
 * @author Takuma Ikeda <eeeeg.takuma.ikeda@gmail.com>
 * @copyright Copyright © EeeeG, Inc.
 */

require_once dirname(__FILE__) . "/class/UserRequest.php";
require_once dirname(__FILE__) . "/class/NotIntgerException.php";
require_once dirname(__FILE__) . "/class/DrinkVendorMachine.php";
require_once dirname(__FILE__) . "/class/IceVendorMachine.php";
require_once dirname(__FILE__) . "/class/TabaccoVendorMachine.php";
require_once dirname(__FILE__) . "/class/NewsPaperVendorMachine.php";

/**
* POST リクエストを UserRequest にセットする関数
* @param array $req $_POST
* @return UserRequest $user_request
*/
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

/**
* 自動販売機クラスに預り金をセットして、変更を反映した HTML タグもセットする関数
* @param VendorMachine $vendor_machine
* @return VendorMachine $vendor_machine
*/
function calcChange($vendor_machine) {

    $item_name = $vendor_machine->getItemName();
    $money     = $vendor_machine->getMoney();
    $change    = $vendor_machine->getChange();
    $msg       = '';

    // 投入したお金が存在する場合
    if (!is_null($money) && !empty($money)) {
        $msg .= $vendor_machine->isDrink()     ? 'ドリンク' : '';
        $msg .= $vendor_machine->isIce()       ? 'アイス'   : '';
        $msg .= $vendor_machine->isTabacco()   ? 'タバコ'   : '';
        $msg .= $vendor_machine->isNewsPaper() ? '新聞紙'   : '';
        $msg .= 'の自動販売機に' . $money . '円を入れました';

        // 端数
        $fraction = getFraction($money);

        if ('0' != $fraction) {
            $msg .= 'が、一円玉・五円玉は使えないため' . $fraction . '円を返却します';
            $money = substr($money, 0, -1) . '0';
            $vendor_machine->setMoney($money);
        }

        $vendor_machine->setMessage($msg);

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
        $msg .= $vendor_machine->isDrink()     ? 'ドリンク' : '';
        $msg .= $vendor_machine->isIce()       ? 'アイス'   : '';
        $msg .= $vendor_machine->isTabacco()   ? 'タバコ'   : '';
        $msg .= $vendor_machine->isNewsPaper() ? '新聞紙'   : '';
        $msg .= 'の自動販売機から' . $change . '円のお釣りをもらいました';
        $vendor_machine->setMessage($msg);
        $vendor_machine->setChange(0);
    }

    // 購入ボタンが押された場合
    if (!is_null($item_name) && !empty($item_name)) {

        $msg .= $vendor_machine->isDrink()     ? 'ドリンク' : '';
        $msg .= $vendor_machine->isIce()       ? 'アイス'   : '';
        $msg .= $vendor_machine->isTabacco()   ? 'タバコ'   : '';
        $msg .= $vendor_machine->isNewsPaper() ? '新聞紙'   : '';
        $msg .= 'の自動販売機の' . $item_name . ' (' . $vendor_machine->getPrice($item_name) . '円) を購入しました';
        $vendor_machine->setMessage($msg);

        $price = $vendor_machine->getPrice($item_name);
        $new_change = (int) $change - (int) $price;
        $vendor_machine->setChange($new_change);
    }

    $change = $vendor_machine->getChange();

    $vendor_machine->setChangeTag('<input class="change" type="text" name="' . $vendor_machine::CHANGE . '" size="10" maxlength="5" placeholder="預り金" value="' . $change . '" disabled>');
    $vendor_machine->setHiddenChangeTag('<input class="change" type="text" name="' . $vendor_machine::CHANGE . '" size="10" maxlength="5" placeholder="預り金" value="' . $change . '" hidden>');
    return $vendor_machine;
}

/**
* 自動販売機クラスの預り金をみて、お釣りボタンの活性・非活性を制御する関数
* @param VendorMachine $vendor_machine
* @return VendorMachine $vendor_machine
*/
function switchReceiveChangeTag($vendor_machine) {

    $change = $vendor_machine->getChange();
    $value = 0;

    // 預り金がないとき
    if (is_null($change) || empty($change)) {
        $vendor_machine->setRecieveChangeTag('<button type="submit" value="' . $value . '" name="' . $vendor_machine::RECEIVE_CHANGE . '" disabled>お釣り</button>');
    // 預り金があるとき
    } else {
        // 0 円より大きいときは活性化する
        if ((int) $change > 0) {
            $value = 1;
            $vendor_machine->setRecieveChangeTag('<button type="submit" value="' . $value . '" name="' . $vendor_machine::RECEIVE_CHANGE . '">お釣り</button>');
        } else {
            $vendor_machine->setRecieveChangeTag('<button type="submit" value="' . $value . '" name="' . $vendor_machine::RECEIVE_CHANGE . '" disabled>お釣り</button>');
        }
    }
    return $vendor_machine;
}

/**
* 自動販売機クラスの預り金をみて、購入ボタンの活性・非活性を制御する関数
* @param VendorMachine $vendor_machine
* @return VendorMachine $vendor_machine
*/
function switchItemNameTag($vendor_machine) {

    $change = $vendor_machine->getChange();
    $prices = $vendor_machine->getPrices();

    foreach($prices as $item_name => $price) {
        // 預り金がないとき
        if (is_null($change) || empty($change)) {
            $vendor_machine->setItemNameTag($item_name, '<button type="submit" value="' . $item_name . '" name="' . $vendor_machine::ITEM_NAME . '" disabled></button>');
        // 預り金があるとき
        } else {
            // 商品の値段以上のときは活性化する
            if ((int) $change >= (int) $price) {
                $vendor_machine->setItemNameTag($item_name, '<button type="submit" value="' . $item_name . '" name="' . $vendor_machine::ITEM_NAME . '"></button>');
            } else {
                $vendor_machine->setItemNameTag($item_name, '<button type="submit" value="' . $item_name . '" name="' . $vendor_machine::ITEM_NAME . '" disabled></button>');
            }
        }
    }
    return $vendor_machine;
}

/**
* すべての自動販売機クラスを調べて、一件のメッセージを返却する関数
* @param DrinkVendorMachine $drink
* @param IceVendorMachine $ice
* @param TabaccoVendorMachine $tabacco
* @param NewsPaperVendorMachine $news_paper
* @return string
*/
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

/**
* エラーが発生したとき、すべてのデータをリセットする関数
* @param VendorMachine $vendor_machine
* @param Exception $error
* @return VendorMachine $vendor_machine
*/
function resetVendorMachine($vendor_machine, $error) {
    $vendor_machine->setMessage($error->getMessage());
    $vendor_machine->setMoney('0');
    $vendor_machine->setChange('0');
    $vendor_machine->setChangeTag('<input class="change" type="text" name="' . $vendor_machine::CHANGE . '" size="10" maxlength="5" placeholder="預り金" disabled>');
    $vendor_machine->setHiddenChangeTag('<input class="change" type="text" name="' . $vendor_machine::CHANGE . '" size="10" maxlength="5" placeholder="預り金" hidden>');
    return $vendor_machine;
}

/**
* ユーザ入力した値が数字どうか判定する関数
* @param $data
* @return bool
*/
function isInt($data) {
    if (!is_null($data) && !empty($data)) {
        if (!preg_match('/^[0-9]+$/', $data)) {
            throw new NotIntgerException('お金は数値で入力してください');
        }
    }
    return true;
}

/**
* ユーザ入力した数字の端数を返却する
* @param $data
* @return string
*/
function getFraction($data) {
    if ('0' != substr($data, -1)) {
        return substr($data, -1);
    }
    return '0';
}
