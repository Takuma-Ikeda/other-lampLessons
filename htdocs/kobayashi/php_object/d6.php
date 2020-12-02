<?php

class post {

  public $text;
  public $likes = 0;

   public function __construct($text)
  {
    $this->text = $text;
  }

  public function show()
  {
    printf('%s (%d)' . PHP_EOL,$this->text,$this->likes);
  }
}


$posts = [];
$posts[0] = new Post('hello');
$posts[1] = new Post('hello again');
$posts[0]->show();
$posts[1]->show();

?>