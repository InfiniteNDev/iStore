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
    'title' => 'required|min:1|max:20',
    'description' => 'required|min:1',
    'price' => 'required|numeric|min:0',
    'discount' => 'numeric|min:0|max:1',
    'stock' => 'required|integer|min:0',
    'availability' => 'integer',
    'image' => 'image|mimes:jpeg,jpg,bmp,png,gif'
  );

  public function category() {
    return $this->belongsTo('Category');
  }
}
