<?php

/**
 * タバコ自動販売機クラス
 *
 * @package class
 * @author Takuma Ikeda <eeeeg.takuma.ikeda@gmail.com>
 * @copyright Copyright © EeeeG, Inc.
 */
require_once dirname(__FILE__) . "/VendorMachine.php";

class TabaccoVendorMachine extends VendorMachine {

    const ITEM_NAME      = 'tabacco_item_name';
    const CHANGE         = 'tabacco_change';
    const MONEY          = 'tabacco_money';
    const RECEIVE_CHANGE = 'receive_tabacco_change';
    const PRICE_400      = 400;
    const PRICE_410      = 410;
    const PRICE_450      = 450;
    const PRICE_500      = 500;
    const PRICE_540      = 540;
    const ITEM_NAME_01   = 'K';
    const ITEM_NAME_02   = 'L';
    const ITEM_NAME_03   = 'M';
    const ITEM_NAME_04   = 'N';
    const ITEM_NAME_05   = 'O';

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
        parent::setItemName($user_request->getTabaccoItemName());
        parent::setMoney($user_request->getTabaccoMoney());
        parent::setChange($user_request->getTabaccoChange());
        parent::setPrices([
            self::ITEM_NAME_01 => self::PRICE_400,
            self::ITEM_NAME_02 => self::PRICE_410,
            self::ITEM_NAME_03 => self::PRICE_450,
            self::ITEM_NAME_04 => self::PRICE_500,
            self::ITEM_NAME_05 => self::PRICE_540,
        ]);
        parent::setIsRecieveChange($user_request->getIsReceiveTabaccoChange());
    }

    /**
    * タバコの自動販売機オブジェクトであれば true を返却する
    *
    * 他の自動販売機オブジェクトの場合、当該関数は定義されていないので抽象クラスの __call より false が返却される
    * @return bool
    */
    public function isTabacco() {
        return true;
    }
}
