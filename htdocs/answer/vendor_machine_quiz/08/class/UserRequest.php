<?php

/**
 * リクエスト管理クラス
 *
 * @package class
 * @author Takuma Ikeda <eeeeg.takuma.ikeda@gmail.com>
 * @copyright Copyright © EeeeG, Inc.
 */
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
