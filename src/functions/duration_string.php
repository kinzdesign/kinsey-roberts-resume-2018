<?php
  function duration_string($months) {
    if($months < 3)
      return '';
    $y = intdiv($months, 12);
    $yLabel = $y != 1 ? 'years' : 'year';
    $m = $months % 12;
    $mLabel = $m != 1 ? 'months' : 'month';
    if($m == 0)
      return "$y $yLabel";
    if($y == 0)
      return "$m $mLabel";
    return "$y $yLabel, $m $mLabel";
  }
