<?php

/**
 * ドリンク自動販売機クラス
 *
 * @package class
 * @author Takuma Ikeda <eeeeg.takuma.ikeda@gmail.com>
 * @copyright Copyright © EeeeG, Inc.
 */
require_once dirname(__FILE__) . "/VendorMachine.php";
require_once dirname(__FILE__) . "/../vendor_machine_quiz_function_09.php";

class DrinkVendorMachine extends VendorMachine {

    const ITEM_NAME      = 'drink_item_name';
    const CHANGE         = 'drink_change';
    const MONEY          = 'drink_money';
    const RECEIVE_CHANGE = 'receive_drink_change';
    const PRICE_130      = 130;
    const PRICE_160      = 160;
    const ITEM_NAME_01   = 'A';
    const ITEM_NAME_02   = 'B';
    const ITEM_NAME_03   = 'C';
    const ITEM_NAME_04   = 'D';
    const ITEM_NAME_05   = 'E';

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
        parent::setItemName($user_request->getDrinkItemName());
        parent::setMoney($user_request->getDrinkMoney());
        parent::setChange($user_request->getDrinkChange());
        parent::setPrices([
            self::ITEM_NAME_01 => self::PRICE_130,
            self::ITEM_NAME_02 => self::PRICE_130,
            self::ITEM_NAME_03 => self::PRICE_130,
            self::ITEM_NAME_04 => self::PRICE_160,
            self::ITEM_NAME_05 => self::PRICE_160,
        ]);
        parent::setIsRecieveChange($user_request->getIsReceiveDrinkChange());
    }

    /**
    * ドリンクの自動販売機オブジェクトであれば true を返却する
    *
    * 他の自動販売機オブジェクトの場合、当該関数は定義されていないので抽象クラスの __call より false が返却される
    * @return bool
    */
    public function isDrink() {
        return true;
    }
}
