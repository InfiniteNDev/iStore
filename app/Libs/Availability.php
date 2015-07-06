<?php

namespace App\Libs;

class Availability {
  /**
   * display availability's text
   * 
   * @param  [integer] $availability [availability fron database]
   * @return [string]          [InStock or not]
   */
  public static function display($availability) {
    if ($availability == 1) {
      return "In Stock";
    }
    else {
      return "Out of Stock";
    }
  }
}