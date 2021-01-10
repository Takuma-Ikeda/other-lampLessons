<?php

class UserRequest {
  private $name;  
  private $furigana;
  private $email;
  private $tel;
  private $sex;
  private $item;
  private $content;

  public function __construct($req)  //new UserRequest($_POST)　これが実行された時Requestされた値がメンバ変数に設定される　コンストラクタの引数名は自分で決められる
  {
    $this->name = $req['name'];
    $this->furigana = $req['furigana'];
    $this->email = $req['email'];
    $this->tel = $req['tel'];
    $this->sex = $req['sex'];
    $this->item = $req['item'];
    $this->content = $req['content'];
  }

  public function getName()
  {
    return $this->name;
  }

  public function getFurigana()
  {
    return $this->furigana;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function getTel()
  {
    return $this->tel;
  }

  public function getSex()
  {
    return $this->sex;
  }

  public function getItem()
  {
    return $this->item;
  }

  public function getContent()
  {
    return $this->content;
  }

  public function setName($name) 
  {
    $this->name = $name;
  }

  public function setFurigana($furigana)
  {
     $this->furigana;
  }

  public function setEmail($email)
  {
     $this->email;
  }

  public function setTel($tel)
  {
     $this->tel;
  }

  public function setSex($sex)
  {
     $this->sex;
  }

  public function setItem($item)
  {
     $this->item;
  }

  public function setContent($content)
  {
     $this->content;
  }

}
