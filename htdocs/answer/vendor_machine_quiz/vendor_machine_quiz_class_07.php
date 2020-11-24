<?php

abstract class VendorMachine {

    private $item_name;
    private $money;
    private $change;
    private $change_tag;
    private $hidden_change_tag;
    private $receive_change_tag;
    private $is_receive_change;
    private $item_name_tags;
    private $message;
    private $prices;

    public function __call($func, $args) {
        switch ($func) {
            case 'isDrink' :
            case 'isIce' :
            case 'isTabacco' :
            case 'isNewsPaper' :
                return false;
                break;
        }
    }

    /*
     * Setter
     */
    public function setItemName($item_name) {
        $this->item_name = $item_name;
    }

    public function setMoney($money) {
        $this->money = $money;
    }

    public function setChange($change) {
        $this->change = $change;
    }

    public function setChangeTag($change_tag) {
        $this->change_tag = $change_tag;
    }

    public function setHiddenChangeTag($hidden_change_tag) {
        $this->hidden_change_tag = $hidden_change_tag;
    }

    public function setRecieveChangeTag($receive_change_tag) {
        $this->receive_change_tag = $receive_change_tag;
    }

    public function setItemNameTags($item_name_tags) {
        $this->item_name_tags = $item_name_tags;
    }

    public function setItemNameTag($item_name, $item_name_tag) {
        $this->item_name_tags[$item_name] = $item_name_tag;
    }

    public function setIsRecieveChange($is_receive_change) {
        $this->is_receive_change = $is_receive_change;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function setPrices($prices) {
        $this->prices = $prices;
    }

    /*
     * Getter
     */
    public function getItemName() {
        return $this->item_name;
    }

    public function getMoney() {
        return $this->money;
    }

    public function getChange() {
        return $this->change;
    }

    public function getChangeTag() {
        return $this->change_tag;
    }

    public function getHiddenChangeTag() {
        return $this->hidden_change_tag;
    }

    public function getRecieveChangeTag() {
        return $this->receive_change_tag;
    }

    public function getIsRecieveChange() {
        return $this->is_receive_change;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getPrices() {
        return $this->prices;
    }

    public function getPrice($item_name) {
        return $this->prices[$item_name];
    }

    public function getItemNameTags() {
        return $this->item_name_tags;
    }

    public function getItemNameTag($item_name) {
        return $this->item_name_tags[$item_name];
    }
}

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

    public function isDrink() {
        return true;
    }
}

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

    public function __construct($user_request) {
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" disabled>');
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" hidden>');
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

    public function isIce() {
        return true;
    }
}

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

    public function __construct($user_request) {
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" disabled>');
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" hidden>');
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

    public function isTabacco() {
        return true;
    }
}

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

    public function __construct($user_request) {
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" disabled>');
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" hidden>');
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

    public function isNewsPaper() {
        return true;
    }
}

class UserRequest {

    private $drink_item_name;
    private $drink_money;
    private $drink_change;
    private $is_receive_drink_change;
    private $ice_item_name;
    private $ice_money;
    private $ice_change;
    private $is_receive_ice_change;
    private $tabacco_item_name;
    private $tabacco_money;
    private $tabacco_change;
    private $is_receive_tabacco_change;
    private $news_paper_item_name;
    private $news_paper_money;
    private $news_paper_change;
    private $is_receive_news_paper_change;

    /*
     * Setter
     */
    public function setDrinkItemName($drink_item_name) {
        $this->drink_item_name = $drink_item_name;
    }

    public function setDrinkMoney($drink_money) {
        $this->drink_money = $drink_money;
    }

    public function setDrinkChange($drink_change) {
        $this->drink_change = $drink_change;
    }

    public function setIsReceiveDrinkChange($is_receive_drink_change) {
        $this->is_receive_drink_change = $is_receive_drink_change;
    }

    public function setIceItemName($ice_item_name) {
        $this->ice_item_name = $ice_item_name;
    }

    public function setIceMoney($ice_money) {
        $this->ice_money = $ice_money;
    }

    public function setIceChange($ice_change) {
        $this->ice_change = $ice_change;
    }

    public function setIsReceiveIceChange($is_receive_ice_change) {
        $this->is_receive_ice_change = $is_receive_ice_change;
    }

    public function setTabaccoItemName($tabacco_item_name) {
        $this->tabacco_item_name = $tabacco_item_name;
    }

    public function setTabaccoMoney($tabacco_money) {
        $this->tabacco_money = $tabacco_money;
    }

    public function setTabaccoChange($tabacco_change) {
        $this->tabacco_change = $tabacco_change;
    }

    public function setIsReceiveTabaccoChange($is_receive_tabacco_change) {
        $this->is_receive_tabacco_change = $is_receive_tabacco_change;
    }

    public function setNewsPaperItemName($news_paper_item_name) {
        $this->news_paper_item_name = $news_paper_item_name;
    }

    public function setNewsPaperMoney($news_paper_money) {
        $this->news_paper_money = $news_paper_money;
    }

    public function setNewsPaperChange($news_paper_change) {
        $this->news_paper_change = $news_paper_change;
    }

    public function setIsReceiveNewsPaperChange($is_receive_news_paper_change) {
        $this->is_receive_news_paper_change = $is_receive_news_paper_change;
    }

    /*
     * Getter
     */
    public function getDrinkItemName() {
        return $this->drink_item_name;
    }

    public function getDrinkMoney() {
        return $this->drink_money;
    }

    public function getDrinkChange() {
        return $this->drink_change;
    }

    public function getIsReceiveDrinkChange() {
        return $this->is_receive_drink_change;
    }

    public function getIceItemName() {
        return $this->ice_item_name;
    }

    public function getIceMoney() {
        return $this->ice_money;
    }

    public function getIceChange() {
        return $this->ice_change;
    }

    public function getIsReceiveIceChange() {
        return $this->is_receive_ice_change;
    }

    public function getTabaccoItemName() {
        return $this->tabacco_item_name;
    }

    public function getTabaccoMoney() {
        return $this->tabacco_money;
    }

    public function getTabaccoChange() {
        return $this->tabacco_change;
    }

    public function getIsReceiveTabaccoChange() {
        return $this->is_receive_tabacco_change;
    }

    public function getNewsPaperItemName() {
        return $this->news_paper_item_name;
    }

    public function getNewsPaperMoney() {
        return $this->news_paper_money;
    }

    public function getNewsPaperChange() {
        return $this->news_paper_change;
    }

    public function getIsReceiveNewsPaperChange() {
        return $this->is_receive_news_paper_change;
    }
}

class NotIntgerException extends Exception {
}
