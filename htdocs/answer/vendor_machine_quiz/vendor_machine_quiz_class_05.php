<?php

abstract class VendorMachine {

    const ITEM_NAME = 'item_name';

    private $item_name;
    private $money;
    private $change;
    private $change_tag;
    private $hidden_change_tag;
    private $receive_change_tag;
    private $is_receive_change;
    private $message;

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

    public function setIsRecieveChange($is_receive_change) {
        $this->is_receive_change = $is_receive_change;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    /*
     * Getter
     */
    public function getItemName($item_name) {
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
}

class DrinkVendorMachine extends VendorMachine {

    const CHANGE         = 'drink_change';
    const MONEY          = 'drink_money';
    const RECEIVE_CHANGE = 'receive_drink_change';

    public function __construct($user_request) {
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" disabled>');
        parent::setHiddenChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" hidden>');
        parent::setRecieveChangeTag('<button type="submit" value="0" name="' . self::RECEIVE_CHANGE . '" disabled>お釣り</button>');
        parent::setItemName($user_request->getItemName());
        parent::setMoney($user_request->getDrinkMoney());
        parent::setChange($user_request->getDrinkChange());
        parent::setIsRecieveChange($user_request->getIsReceiveDrinkChange());
    }
}

class IceVendorMachine extends VendorMachine {

    const CHANGE         = 'ice_change';
    const MONEY          = 'ice_money';
    const RECEIVE_CHANGE = 'receive_ice_change';

    public function __construct($user_request) {
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" disabled>');
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" hidden>');
        parent::setRecieveChangeTag('<button type="submit" value="0" name="' . self::RECEIVE_CHANGE . '" disabled>お釣り</button>');
        parent::setItemName($user_request->getItemName());
        parent::setMoney($user_request->getIceMoney());
        parent::setChange($user_request->getIceChange());
        parent::setIsRecieveChange($user_request->getIsReceiveIceChange());
    }
}

class TabaccoVendorMachine extends VendorMachine {

    const CHANGE         = 'tabacco_change';
    const MONEY          = 'tabacco_money';
    const RECEIVE_CHANGE = 'receive_tabacco_change';

    public function __construct($user_request) {
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" disabled>');
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" hidden>');
        parent::setRecieveChangeTag('<button type="submit" value="0" name="' . self::RECEIVE_CHANGE . '" disabled>お釣り</button>');
        parent::setItemName($user_request->getItemName());
        parent::setMoney($user_request->getTabaccoMoney());
        parent::setChange($user_request->getTabaccoChange());
        parent::setIsRecieveChange($user_request->getIsReceiveTabaccoChange());
    }
}

class NewsPaperVendorMachine extends VendorMachine {

    const CHANGE         = 'news_paper_change';
    const MONEY          = 'news_paper_money';
    const RECEIVE_CHANGE = 'receive_news_paper_change';

    public function __construct($user_request) {
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" disabled>');
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" hidden>');
        parent::setRecieveChangeTag('<button type="submit" value="0" name="' . self::RECEIVE_CHANGE . '" disabled>お釣り</button>');
        parent::setItemName($user_request->getItemName());
        parent::setMoney($user_request->getNewsPaperMoney());
        parent::setChange($user_request->getNewsPaperChange());
        parent::setIsRecieveChange($user_request->getIsReceiveNewsPaperChange());
    }
}

class UserRequest {

    private $item_name;
    private $drink_money;
    private $drink_change;
    private $is_receive_drink_change;
    private $ice_money;
    private $ice_change;
    private $is_receive_ice_change;
    private $tabacco_money;
    private $tabacco_change;
    private $is_receive_tabacco_change;
    private $news_paper_money;
    private $news_paper_change;
    private $is_receive_news_paper_change;

    /*
     * Setter
     */
    public function setItemName($item_name) {
        $this->item_name = $item_name;
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

    public function setIceMoney($ice_money) {
        $this->ice_money = $ice_money;
    }

    public function setIceChange($ice_change) {
        $this->ice_change = $ice_change;
    }

    public function setIsReceiveIceChange($is_receive_ice_change) {
        $this->is_receive_ice_change = $is_receive_ice_change;
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
    public function getItemName() {
        return $this->item_name;
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

    public function getIceMoney() {
        return $this->ice_money;
    }

    public function getIceChange() {
        return $this->ice_change;
    }

    public function getIsReceiveIceChange() {
        return $this->is_receive_ice_change;
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
