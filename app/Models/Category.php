<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

  protected $fillable = array('name');

  public static $rules = array('name' => 'required|min:3|max:20');

  public function products() {
    return $this->hasMany('Product');
  }

}
