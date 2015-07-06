<?php

namespace App\Libs;

class Discount {

  /**
   * display discount's text or num
   * 
   * @param  [integer] $discount [discount fron database]
   * @return [string]          [onsale or not]
   */
  public static function displayWithNum($discount) {
    if ($discount == 1) {
      return "No Discount";
    }
    else {
      return $discount;
    }
  }

  /**
   * display discount's text
   * 
   * @param  [integer] $discount [discount fron database]
   * @return [string]          [onsale or not]
   */
  public static function display($discount) {
    if ($discount == 1) {
      return "No Discount";
    }
    else {
      return "On sale";
    }
  }
}