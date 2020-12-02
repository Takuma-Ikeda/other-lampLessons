<?php

class Post
{
  protected $text;

  public function __construct($text)
  {
    $this->text = $text;
  }

  final public function show()
  {
    printf('%s' . PHP_EOL, $this->text);
  }
}

class SponsoredPost extends Post
{
  private $sponsor;
  
  public function __construct($text, $sponsor)
  {
    parent::__construct($text);
    $this->sponsor = $sponsor;
  }
  
  public function showSponsor()
  {
    printf('%s' . PHP_EOL, $this->sponsor);
  }
  
  // override
  public function show()
  {
    printf('%s by %s' . PHP_EOL, $this->text, $this->sponsor);
  }
}

$posts = [];
$posts[0] = new Post('hello');
$posts[1] = new Post('hello again');
$posts[2] = new SponsoredPost('hello hello', 'dotinstall');

$posts[0]->show();
$posts[1]->show();
$posts[2]->show();
$posts[2]->showSponsor();