<?php

/**
 * 新聞紙自動販売機クラス
 *
 * @package class
 * @author Takuma Ikeda <eeeeg.takuma.ikeda@gmail.com>
 * @copyright Copyright © EeeeG, Inc.
 */
require_once dirname(__FILE__) . "/VendorMachine.php";

class NewsPaperVendorMachine extends VendorMachine {

    const ITEM_NAME      = 'news_paper_item_name';
    const CHANGE         = 'news_paper_change';
    const MONEY          = 'news_paper_money';
    const RECEIVE_CHANGE = 'receive_news_paper_change';
    const PRICE_150      = 150;
    const PRICE_180      = 180;
    const ITEM_NAME_01   = 'P';
    const ITEM_NAME_02   = 'Q';
    const ITEM_NAME_03   = 'R';
    const ITEM_NAME_04   = 'S';
    const ITEM_NAME_05   = 'T';

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
        parent::setItemName($user_request->getNewsPaperItemName());
        parent::setMoney($user_request->getNewsPaperMoney());
        parent::setChange($user_request->getNewsPaperChange());
        parent::setPrices([
            self::ITEM_NAME_01 => self::PRICE_150,
            self::ITEM_NAME_02 => self::PRICE_150,
            self::ITEM_NAME_03 => self::PRICE_150,
            self::ITEM_NAME_04 => self::PRICE_150,
            self::ITEM_NAME_05 => self::PRICE_180,
        ]);
        parent::setIsRecieveChange($user_request->getIsReceiveNewsPaperChange());
    }

    /**
    * 新聞紙の自動販売機オブジェクトであれば true を返却する
    *
    * 他の自動販売機オブジェクトの場合、当該関数は定義されていないので抽象クラスの __call より false が返却される
    * @return bool
    */
    public function isNewsPaper() {
        return true;
    }
}
