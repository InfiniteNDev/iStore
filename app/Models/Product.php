<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = array(
    'category_id',
    'title',
    'description',
    'price',
    'discount',
    'stock',
    'availability',
    'image'
  );

  public static $rules = array(
    'category_id' => 'required|integer',
    'title' => 'required|min:1',
    'description' => 'required|min:1',
    'price' => 'required|numeric',
    'discount' => 'numeric',
    'stock' => 'required|integer',
    'availability' => 'integer',
    'image' => 'image|mimes:jpeg,jpg,bmp,png,gif'
  );

  public function category() {
    return $this->belongsTo('Category');
  }
}
