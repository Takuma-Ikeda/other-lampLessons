<?php

for($i =1; $i <=10; $i++) {
  $star ='';
  for($j = 1; $j <= 5; $j++) {
    if($i % 2 === 0) {
      if($j % 2 === 0) {
        $star .= '★';
      } else {
        $star .= '☆';
      }
    } else {
      if($j % 2 === 0) {
        $star .= '☆';
      } else {
        $star .= '★';
      }
    }
    
  } 
  $star .= PHP_EOL;
  echo nl2br($star);
}