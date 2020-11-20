<?php

abstract class VendorMachine {

    private $item_name;
    private $money;
    private $change;
    private $change_tag;

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
}

class DrinkVendorMachine extends VendorMachine {

    const ITEM_NAME = 'drink_item_name';
    const CHANGE    = 'drink_change';
    const MONEY     = 'drink_money';

    public function __construct($user_request) {
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" disabled>');
        parent::setItemName($user_request->getDrinkItemName());
        parent::setMoney($user_request->getDrinkMoney());
        parent::setChange($user_request->getDrinkChange());
    }
}

class IceVendorMachine extends VendorMachine {

    const ITEM_NAME = 'ice_item_name';
    const CHANGE    = 'ice_change';
    const MONEY     = 'ice_money';

    public function __construct($user_request) {
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" disabled>');
        parent::setItemName($user_request->getIceItemName());
        parent::setMoney($user_request->getIceMoney());
        parent::setChange($user_request->getIceChange());
    }
}

class TabaccoVendorMachine extends VendorMachine {

    const ITEM_NAME = 'tabacco_item_name';
    const CHANGE    = 'tabacco_change';
    const MONEY     = 'tabacco_money';

    public function __construct($user_request) {
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" disabled>');
        parent::setItemName($user_request->getTabaccoItemName());
        parent::setMoney($user_request->getTabaccoMoney());
        parent::setChange($user_request->getTabaccoChange());
    }
}

class NewsPaperVendorMachine extends VendorMachine {

    const ITEM_NAME = 'news_paper_item_name';
    const CHANGE    = 'news_paper_change';
    const MONEY     = 'news_paper_money';

    public function __construct($user_request) {
        parent::setChangeTag('<input class="change" type="text" name="' . self::CHANGE . '" size="10" maxlength="5" placeholder="預り金" disabled>');
        parent::setItemName($user_request->getNewsPaperItemName());
        parent::setMoney($user_request->getNewsPaperMoney());
        parent::setChange($user_request->getNewsPaperChange());
    }
}

class UserRequest {

    private $drink_item_name;
    private $drink_money;
    private $drink_change;
    private $ice_item_name;
    private $ice_money;
    private $ice_change;
    private $tabacco_item_name;
    private $tabacco_money;
    private $tabacco_change;
    private $news_paper_item_name;
    private $news_paper_money;
    private $news_paper_change;

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

    public function setIceItemName($ice_item_name) {
        $this->ice_item_name = $ice_item_name;
    }

    public function setIceMoney($ice_money) {
        $this->ice_money = $ice_money;
    }

    public function setIceChange($ice_change) {
        $this->ice_change = $ice_change;
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

    public function setNewsPaperItemName($news_paper_item_name) {
        $this->news_paper_item_name = $news_paper_item_name;
    }

    public function setNewsPaperMoney($news_paper_money) {
        $this->news_paper_money = $news_paper_money;
    }

    public function setNewsPaperChange($news_paper_change) {
        $this->news_paper_change = $news_paper_change;
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

    public function getIceItemName() {
        return $this->ice_item_name;
    }

    public function getIceMoney() {
        return $this->ice_money;
    }

    public function getIceChange() {
        return $this->ice_change;
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

    public function getNewsPaperItemName() {
        return $this->drink_item_name;
    }

    public function getNewsPaperMoney() {
        return $this->news_paper_money;
    }

    public function getNewsPaperChange() {
        return $this->news_paper_change;
    }
}
