<?php

/**
 * アイス自動販売機クラス
 *
 * @package class
 * @author Takuma Ikeda <eeeeg.takuma.ikeda@gmail.com>
 * @copyright Copyright © EeeeG, Inc.
 */
require_once dirname(__FILE__) . "/VendorMachine.php";
require_once dirname(__FILE__) . "/../vendor_machine_quiz_function_09.php";

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
        parent::setChangeTag(createChangeTag(null, self::CHANGE));
        parent::setHiddenChangeTag(createChangeTag(null, self::CHANGE, true));
        parent::setRecieveChangeTag(createRecieveChangeTag(null, self::RECEIVE_CHANGE));
        parent::setItemNameTags([
            self::ITEM_NAME_01 => createItemNameTag(self::ITEM_NAME_01, self::ITEM_NAME),
            self::ITEM_NAME_02 => createItemNameTag(self::ITEM_NAME_02, self::ITEM_NAME),
            self::ITEM_NAME_03 => createItemNameTag(self::ITEM_NAME_03, self::ITEM_NAME),
            self::ITEM_NAME_04 => createItemNameTag(self::ITEM_NAME_04, self::ITEM_NAME),
            self::ITEM_NAME_05 => createItemNameTag(self::ITEM_NAME_05, self::ITEM_NAME),
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
