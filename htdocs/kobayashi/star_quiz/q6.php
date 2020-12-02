<?php

for($i = 1; $i <= 5; $i++) {
  $star ='';
  for($j = 5; $j >= $i; $j--) {
    $star .= '★';
    echo('$i の値は ' . $i . ' ');
    echo('$j の値は ' . $j . '<br>');
  }
 
  $star .= PHP_EOL;
  echo nl2br($star);
}