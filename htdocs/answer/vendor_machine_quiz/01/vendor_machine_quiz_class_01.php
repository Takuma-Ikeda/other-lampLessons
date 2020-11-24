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

    public function __construct() {
        parent::setChangeTag('<input class="change" type="text" name="drink_change" size="10" maxlength="5" placeholder="預り金" disabled>');
    }
}

class IceVendorMachine extends VendorMachine {

    public function __construct() {
        parent::setChangeTag('<input class="change" type="text" name="ice_change" size="10" maxlength="5" placeholder="預り金" disabled>');
    }
}

class TabaccoVendorMachine extends VendorMachine {

    public function __construct() {
        parent::setChangeTag('<input class="change" type="text" name="tabacco_change" size="10" maxlength="5" placeholder="預り金" disabled>');
    }
}

class NewsPaperVendorMachine extends VendorMachine {

    public function __construct() {
        parent::setChangeTag('<input class="change" type="text" name="news_paper_change" size="10" maxlength="5" placeholder="預り金" disabled>');
    }
}

