<?php

abstract class VendorMachine {

    private $item_name;
    private $money;
    private $change;

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
}

class DrinkVendorMachine extends VendorMachine {

    public function __construct() {
        $this->change_tag = '<input type="text" name="drink_change" size="10" maxlength="5" placeholder="お釣り" value="0" disabled>';
        $this->money_tag  = '<input type="text" name="drink_money" size="10" maxlength="5" placeholder="数値">';
    }
}

class IceVendorMachine extends VendorMachine {

    public function __construct() {
        $this->change_tag = '<input type="text" name="ice_change" size="10" maxlength="5" placeholder="お釣り" value="0" disabled>';
        $this->money_tag  = '<input type="text" name="ice_money" size="10" maxlength="5" placeholder="数値">';
    }
}

class TabaccoVendorMachine extends VendorMachine {

    public function __construct() {
        $this->change_tag = '<input type="text" name="tabacco_change" size="10" maxlength="5" placeholder="お釣り" value="0" disabled>';
        $this->money_tag  = '<input type="text" name="tabacco_money" size="10" maxlength="5" placeholder="数値">';
    }
}

class NewsPaperVendorMachine extends VendorMachine {

    public function __construct() {
        $this->change_tag = '<input type="text" name="news_paper_change" size="10" maxlength="5" placeholder="お釣り" value="0" disabled>';
        $this->money_tag  = '<input type="text" name="news_paper_money" size="10" maxlength="5" placeholder="数値">';
    }
}

