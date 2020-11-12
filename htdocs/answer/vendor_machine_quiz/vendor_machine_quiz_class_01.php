<?php

abstract class VendorMachine {

    private $item_name;
    private $money;
    private $change;
    private $money_tag;
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

    public function setMoneyTag($money_tag) {
        $this->money_tag = $money_tag;
    }

    public function setChangeTag($change_tag) {
        $this->change_tag = $change_tag;
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

    public function getMoneyTag() {
        return $this->money_tag;
    }

    public function getChangeTag() {
        return $this->change_tag;
    }
}

class DrinkVendorMachine extends VendorMachine {

    public function __construct() {
        $this->setChangeTag('<input type="text" name="drink_change" size="10" maxlength="5" placeholder="預り金" disabled>');
        $this->setMoneyTag('<input type="text" name="drink_money" size="10" maxlength="5" placeholder="数値">');
    }
}

class IceVendorMachine extends VendorMachine {

    public function __construct() {
        $this->setChangeTag('<input type="text" name="ice_change" size="10" maxlength="5" placeholder="預り金" disabled>');
        $this->setMoneyTag('<input type="text" name="ice_money" size="10" maxlength="5" placeholder="数値">');
    }
}

class TabaccoVendorMachine extends VendorMachine {

    public function __construct() {
        $this->setChangeTag('<input type="text" name="tabacco_change" size="10" maxlength="5" placeholder="預り金" disabled>');
        $this->setMoneyTag('<input type="text" name="tabacco_money" size="10" maxlength="5" placeholder="数値">');
    }
}

class NewsPaperVendorMachine extends VendorMachine {

    public function __construct() {
        $this->setChangeTag('<input type="text" name="news_paper_change" size="10" maxlength="5" placeholder="預り金" disabled>');
        $this->setMoneyTag('<input type="text" name="news_paper_money" size="10" maxlength="5" placeholder="数値">');
    }
}

