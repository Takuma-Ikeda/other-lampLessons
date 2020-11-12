<?php

abstract class VendorMachine {

    private $item_name;
    private $money;
    private $change;
    private $money_tag;
    private $change_tag;

    public function createChangeTag($name, $change) {
        if (is_null($change)) {
            $this->setChangeTag('<input type="text" name="' . $name . '" size="10" maxlength="5" placeholder="預り金" disabled>');
        } else {
            $this->setChangeTag('<input type="text" name="' . $name . '" size="10" maxlength="5" placeholder="預り金" value="' . $change . '" disabled>');
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

    const CHANGE = 'drink_change';

    public function __construct($user_request) {
        // 結果的に setChangeTag($change_tag) が実行される
        $this->createChangeTag(self::CHANGE, null);
        $this->setMoneyTag('<input type="text" name="drink_money" size="10" maxlength="5" placeholder="数値">');
        $this->setItemName($user_request->getItemName());
        $this->setMoney($user_request->getDrinkMoney());
        $this->setChange($user_request->getDrinkChange());
    }
}

class IceVendorMachine extends VendorMachine {

    const CHANGE = 'ice_change';

    public function __construct($user_request) {
        // 結果的に setChangeTag($change_tag) が実行される
        $this->createChangeTag(self::CHANGE, null);
        $this->setMoneyTag('<input type="text" name="ice_money" size="10" maxlength="5" placeholder="数値">');
        $this->setItemName($user_request->getItemName());
        $this->setMoney($user_request->getIceMoney());
        $this->setChange($user_request->getIceChange());
    }
}

class TabaccoVendorMachine extends VendorMachine {

    const CHANGE = 'tabacco_change';

    public function __construct($user_request) {
        // 結果的に setChangeTag($change_tag) が実行される
        $this->createChangeTag(self::CHANGE, null);
        $this->setMoneyTag('<input type="text" name="tabacco_money" size="10" maxlength="5" placeholder="数値">');
        $this->setItemName($user_request->getItemName());
        $this->setMoney($user_request->getTabaccoMoney());
        $this->setChange($user_request->getTabaccoChange());
    }
}

class NewsPaperVendorMachine extends VendorMachine {

    const CHANGE = 'news_paper_change';

    public function __construct($user_request) {
        // 結果的に setChangeTag($change_tag) が実行される
        $this->createChangeTag(self::CHANGE, null);
        $this->setMoneyTag('<input type="text" name="news_paper_money" size="10" maxlength="5" placeholder="数値">');
        $this->setItemName($user_request->getItemName());
        $this->setMoney($user_request->getNewsPaperMoney());
        $this->setChange($user_request->getNewsPaperChange());
    }
}

class UserRequest {

    private $item_name;
    private $drink_money;
    private $drink_change;
    private $ice_money;
    private $ice_change;
    private $tabacco_money;
    private $tabacco_change;
    private $news_paper_money;
    private $news_paper_change;

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

    public function setIceMoney($ice_money) {
        $this->ice_money = $ice_money;
    }

    public function setIceChange($ice_change) {
        $this->ice_change = $ice_change;
    }

    public function setTabaccoMoney($tabacco_money) {
        $this->tabacco_money = $tabacco_money;
    }

    public function setTabaccoChange($tabacco_change) {
        $this->tabacco_change = $tabacco_change;
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
    public function getItemName() {
        return $this->item_name;
    }

    public function getDrinkMoney() {
        return $this->drink_money;
    }

    public function getDrinkChange() {
        return $this->drink_change;
    }

    public function getIceMoney() {
        return $this->ice_money;
    }

    public function getIceChange() {
        return $this->ice_change;
    }

    public function getTabaccoMoney() {
        return $this->tabacco_money;
    }

    public function getTabaccoChange() {
        return $this->tabacco_change;
    }

    public function getNewsPaperMoney() {
        return $this->news_paper_money;
    }

    public function getNewsPaperChange() {
        return $this->news_paper_change;
    }
}
