<?php

// grid dimensions by number of items per row/col
const GRID_H = 4;
const GRID_W = 7;

// body background
const BG_COLOR = '#8af';

// include constants based on grid dimensions
// -- distinct files will be needed
require("constants-" . GRID_H . "-" . GRID_W . ".php");

/**
 * Available constants (unit: pixels):
 *
 *   CAP_H: Height of triangular "cap" at top/bottom
 *   SQ_H: Height of central square area
 *      0 forms a diamond
 *      >0 forms a hexagon
 *   SQ_W: Width of item in center
 *      Define 2 * CAP_H for square diamond
 *   GAP: Width of gap between items
 *   OFFSET_L: Offset from left
 *   OFFSET_T: Offset from top
 */

// calculated constants
define('OFFSET_ODD', OFFSET_L + (GAP / 2));
define('OFFSET_EVEN', OFFSET_L + GAP + (SQ_W / 2));
define('HEX_HEIGHT', 2 * CAP_H + SQ_H);
define('VERTICAL_GAP', GAP * sqrt(3) / 2);

$imgs = glob('img/*.png');

$output = '';
for($row = 1; $row <= GRID_H; $row++) {
  for($col = 1; $col <= GRID_W; $col++) {

    $item_number = ($row - 1) * GRID_W + $col;
    // placeholder file
    $file = 'img/enkidu.png';
    foreach($imgs as $img) {
      if(str_starts_with($img, "img/{$item_number}_")) {
        $file = $img;
        break;
      }
    }

    // define top-left corner of item
    if($row % 2 == 1) {
      $x = OFFSET_ODD + (SQ_W + GAP) * ($col - 1);
    } else {
      $x = OFFSET_EVEN + (SQ_W + GAP) * ($col - 1);
    }
    $y = OFFSET_T + (CAP_H + SQ_H + VERTICAL_GAP) * ($row - 1);

    // meaty:
    $output .= "<div class=\"portrait\" style=\"
        left: {$x};
        top: {$y};
        background-image: url({$file});
      \"></div>";
  }
}

function points() {
  // Starting at top point, going clockwise
  $path = [];
  $path[] = SQ_W / 2 . 'px 0';
  $path[] = SQ_W . 'px ' . CAP_H . 'px';
  $path[] = SQ_W . 'px ' . CAP_H + SQ_H . 'px';
  $path[] = SQ_W / 2 . 'px ' . HEX_HEIGHT . 'px';
  $path[] = '0 ' . CAP_H + SQ_H . 'px';
  $path[] = '0 ' . CAP_H . 'px';
  return implode(', ', $path);
}
?>

<html>
  <head>
    <style>
      .portrait {
        position: absolute;
        width: <?php echo SQ_W; ?>;
        height: <?php echo HEX_HEIGHT; ?>;
        background-size: <?php echo ITEM_RESIZE; ?>;
        background-position: <?php echo ITEM_POSITION; ?>;
        clip-path: polygon(<?php echo points() ?>);
      }
    </style>
  </head>
  <body style="color: white; background-color: <?php echo BG_COLOR ?>; background-image: url('img/bg.png'); background-position-x: right;">
    <?php echo $output ?>
  </body>
</html>
