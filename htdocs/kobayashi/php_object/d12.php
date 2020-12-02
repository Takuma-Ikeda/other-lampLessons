<?php

class Post //親クラス Superクラス
{
  private $text;

  public function __construct($text)
  {
    $this->text = $text;
  }

  public function show()
  {
    printf('%s' . PHP_EOL,$this->text);
  }
}

class SponsoredPost extends Post //子クラス Subクラス
{

}

$Posts = [];
$Posts[0] = new Post('hello');
$Posts[1] = new Post('hello again');
$Posts[2] = new SponsoredPost('hello hello');

$Posts[0]->show();
$Posts[1]->show();
$Posts[2]->show();