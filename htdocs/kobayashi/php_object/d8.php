<?php

class Post
{
  private $text;
  private $likes = 0;

  public function __construct($text)
  {
    $this->text = $text;
  }

  public function show()
  {
    printf('%s (%d)' . PHP_EOL, $this->text, $this->likes);
  }
  
  public function like()
  {
    $this->likes++;
    
    if ($this->likes > 100) {
      $this->likes = 100;
    }
  }
}

$posts = [];
$posts[0] = new Post('hello');
$posts[1] = new Post('hello again');

// $posts[0]->likes++;
// $posts[0]->likes = -100;
$posts[0]->like();

$posts[0]->show();
$posts[1]->show();