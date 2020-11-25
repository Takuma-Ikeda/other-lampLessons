<?php

for($i = 1; $i <= 5; $i++) {
  $star ='';
  for($j = 1; $j <= $i; $j++) {
    $star .= '★';
  }
 
  $star .= PHP_EOL;
  echo nl2br($star);
}