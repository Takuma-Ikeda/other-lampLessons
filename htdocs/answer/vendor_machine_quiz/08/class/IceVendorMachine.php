<?php

/**
 * アイス自動販売機クラス
 *
 * @package class
 * @author Takuma Ikeda <eeeeg.takuma.ikeda@gmail.com>
 * @copyright Copyright © EeeeG, Inc.
 */
require_once dirname(__FILE__) . "/VendorMachine.php";

class IceVendorMachine extends VendorMachine {

    const ITEM_NAME      = 'ice_item_name';
    const CHANGE         = 'ice_change';
    const MONEY          = 'ice_money';
    const RECEIVE_CHANGE = 'receive_ice_change';
    const PRICE_140      = 140;
    const PRICE_170      = 170;
    const ITEM_NAME_01   = 'F';
    const ITEM_NAME_02   = 'G';
    const ITEM_NAME_03   = 'H';
    const ITEM_NAME_04   = 'I';
    const ITEM_NAME_05   = 'J';

    /**
    * コンストラクタ
    *
    * @param UserRequest $user_request
    */
    public function __construct($user_request) {
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" disabled>');
        parent::setHiddenChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" hidden>');
        parent::setRecieveChangeTag('<button type="submit" value="0" name="' . self::RECEIVE_CHANGE . '" disabled>お釣り</button>');
        parent::setItemNameTags([
            self::ITEM_NAME_01 => '<button type="submit" value="' . self::ITEM_NAME_01 . '" name="' . self::ITEM_NAME . '" disabled></button>',
            self::ITEM_NAME_02 => '<button type="submit" value="' . self::ITEM_NAME_02 . '" name="' . self::ITEM_NAME . '" disabled></button>',
            self::ITEM_NAME_03 => '<button type="submit" value="' . self::ITEM_NAME_03 . '" name="' . self::ITEM_NAME . '" disabled></button>',
            self::ITEM_NAME_04 => '<button type="submit" value="' . self::ITEM_NAME_04 . '" name="' . self::ITEM_NAME . '" disabled></button>',
            self::ITEM_NAME_05 => '<button type="submit" value="' . self::ITEM_NAME_05 . '" name="' . self::ITEM_NAME . '" disabled></button>',
        ]);
        parent::setItemName($user_request->getIceItemName());
        parent::setMoney($user_request->getIceMoney());
        parent::setChange($user_request->getIceChange());
        parent::setPrices([
            self::ITEM_NAME_01 => self::PRICE_140,
            self::ITEM_NAME_02 => self::PRICE_140,
            self::ITEM_NAME_03 => self::PRICE_140,
            self::ITEM_NAME_04 => self::PRICE_170,
            self::ITEM_NAME_05 => self::PRICE_170,
        ]);
        parent::setIsRecieveChange($user_request->getIsReceiveIceChange());
    }

    /**
    * アイスの自動販売機オブジェクトであれば true を返却する
    *
    * 他の自動販売機オブジェクトの場合、当該関数は定義されていないので抽象クラスの __call より false が返却される
    * @return bool
    */
    public function isIce() {
        return true;
    }
}
