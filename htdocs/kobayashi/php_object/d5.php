<?php

class post {

  public $text;
  public $likes;

  // public function __construct($textFromNew, $likesFromNew)
  // {
  //   $this->text = $textFromNew;
  //   $this->likes = $likesFromNew;
  // }

   public function __construct($text, $likes)
  {
    $this->text = $text;
    $this->likes = $likes;
  }

  public function show()
  {
    printf('%s (%d)' . PHP_EOL,$this->text,$this->likes);
  }
}


$posts = [];
$posts[0] = new Post('hello', 0);
// $posts[0] ->text = 'hello';
// $posts[0] ->likes = 0;
$posts[1] = new Post('hello again', 0);
// $posts[1] ->text = 'hello again';
// $posts[1] ->likes = 0;

$posts[0]->show();
$posts[1]->show();

?>