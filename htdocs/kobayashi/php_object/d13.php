<?php

class Post
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

class SponsoredPost extends Post
{
  private $sponsor;

  public function __construct($text,$sponsor)
  {
    parent::__construct($text);
    $this->sponcer = $sponsor;
  }

  public function showSponcer()
  {
    printf('%s' . PHP_EOL, $this->sponcer);
  }
}

$posts = [];
$posts[0] = new Post('hello');
$posts[1] = new Post('hello again');
$posts[2] = new SponsoredPost('hello hello','dotinstall');

$posts[0]->show();
$posts[1]->show();
$posts[2]->show();
$posts[2]->showSponcer();