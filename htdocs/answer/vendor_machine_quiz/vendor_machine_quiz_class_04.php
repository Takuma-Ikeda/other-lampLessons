<?php

abstract class VendorMachine {

    const ITEM_NAME = 'item_name';

    private $item_name;
    private $money;
    private $change;
    private $change_tag;
    private $hidden_change_tag;

    public function createChangeTag($name, $value, $is_hidden = false) {
        if ($is_hidden) {
            if (is_null($value) || empty($value)) {
                $this->setHiddenChangeTag('<input class="change" type="text" name="' . $name . '" size="10" maxlength="5" placeholder="預り金" hidden>');
            } else {
                $this->setHiddenChangeTag('<input class="change" type="text" name="' . $name . '" size="10" maxlength="5" placeholder="預り金" value="' . $value . '" hidden>');
            }
        } else {
            if (is_null($value) || empty($value)) {
                $this->setChangeTag('<input class="change" type="text" name="' . $name . '" size="10" maxlength="5" placeholder="預り金" disabled>');
            } else {
                $this->setChangeTag('<input class="change" type="text" name="' . $name . '" size="10" maxlength="5" placeholder="預り金" value="' . $value . '" disabled>');
            }
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
}

class DrinkVendorMachine extends VendorMachine {

    const CHANGE = 'drink_change';
    const MONEY  = 'drink_money';

    public function __construct($user_request) {
        parent::createChangeTag(self::CHANGE, $user_request->getDrinkChange());
        parent::createChangeTag(self::CHANGE, $user_request->getDrinkChange(), true);
        parent::setItemName($user_request->getItemName());
        parent::setMoney($user_request->getDrinkMoney());
        parent::setChange($user_request->getDrinkChange());
    }
}

class IceVendorMachine extends VendorMachine {

    const CHANGE = 'ice_change';
    const MONEY  = 'ice_money';

    public function __construct($user_request) {
        parent::createChangeTag(self::CHANGE, $user_request->getIceChange());
        parent::createChangeTag(self::CHANGE, $user_request->getIceChange(), true);
        parent::setItemName($user_request->getItemName());
        parent::setMoney($user_request->getIceMoney());
        parent::setChange($user_request->getIceChange());
    }
}

class TabaccoVendorMachine extends VendorMachine {

    const CHANGE = 'tabacco_change';
    const MONEY  = 'tabacco_money';

    public function __construct($user_request) {
        parent::createChangeTag(self::CHANGE, $user_request->getTabaccoChange());
        parent::createChangeTag(self::CHANGE, $user_request->getTabaccoChange(), true);
        parent::setItemName($user_request->getItemName());
        parent::setMoney($user_request->getTabaccoMoney());
        parent::setChange($user_request->getTabaccoChange());
    }
}

class NewsPaperVendorMachine extends VendorMachine {

    const CHANGE = 'news_paper_change';
    const MONEY  = 'news_paper_money';

    public function __construct($user_request) {
        parent::createChangeTag(self::CHANGE, $user_request->getNewsPaperChange());
        parent::createChangeTag(self::CHANGE, $user_request->getNewsPaperChange(), true);
        parent::setItemName($user_request->getItemName());
        parent::setMoney($user_request->getNewsPaperMoney());
        parent::setChange($user_request->getNewsPaperChange());
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
