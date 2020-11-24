<?php

/**
 * 自動販売機抽象クラス
 *
 * @package class
 * @author Takuma Ikeda <eeeeg.takuma.ikeda@gmail.com>
 * @copyright Copyright © EeeeG, Inc.
 */
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

    /**
    * マジックメソッド __call
    *
    * 自動販売機クラスに当該関数が定義されていない場合は false を返却する
    * @param string $func
    * @param array $args
    * @return bool
    */
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
