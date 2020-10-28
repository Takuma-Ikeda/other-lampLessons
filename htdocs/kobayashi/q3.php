<?php



for($i =1; $i <=10; $i++) {
  $star ='';
  for($j = 1; $j <= 5; $j++) {
    $star .= '★';
  } 
  $star .= PHP_EOL;
  echo nl2br($star);
}


