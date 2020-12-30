<?php

/**
 * リクエスト管理クラス
 *
 * @package class
 * @author Takuma Ikeda <eeeeg.takuma.ikeda@gmail.com>
 * @copyright Copyright © EeeeG, Inc.
 */
class UserRequest {

    const NAME     = 'name';
    const FURIGANA = 'furigana';
    const EMAIL    = 'email';
    const TEL      = 'tel';
    const SEX      = 'sex_id';
    const ITEM     = 'item_id';
    const CONTENT  = 'content';

    private $name;
    private $furigana;
    private $email;
    private $tel;
    private $sex_id;
    private $item_id;
    private $content;

    /**
    * コンストラクタ
    *
    * @param array $user_request
    */
    public function __construct($user_request) {
        $this->name     = $user_request[self::NAME];
        $this->furigana = $user_request[self::FURIGANA];
        $this->email    = $user_request[self::EMAIL];
        $this->tel      = $user_request[self::TEL];
        $this->sex_id   = $user_request[self::SEX];
        $this->item_id  = $user_request[self::ITEM];
        $this->content  = $user_request[self::CONTENT];
    }

    /*
     * Setter
     */
    public function setName($name) {
        $this->name = $name;
    }

    public function setFurigana($furigana) {
        $this->furigana = $furigana;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function setSexId($sex_id) {
        $this->sex_id = $sex_id;
    }

    public function setItemId($item_id) {
        $this->item_id = $item_id;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    /*
     * Getter
     */
    public function getName() {
        return $this->name;
    }

    public function getFurigana() {
        return $this->furigana;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getSexId() {
        return $this->sex_id;
    }

    public function getItemId() {
        return $this->item_id;
    }

    public function getContent() {
        return $this->content;
    }
}
