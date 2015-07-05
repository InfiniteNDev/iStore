<?php

use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\Category;

class ProductTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('products')->delete();

    $faker = Faker\Factory::create();
    // Product::truncate();
    
    $categories = Category::lists('id')->all();

    foreach(range(1,60) as $index)
    {
      Product::create(
        array(
          'category_id'  => $faker->randomElement($categories),
          'title'        => $faker->name,
          'description'  => $faker->text,
          'price'        => (float)rand(0, 10000),
          'discount'     => 1,
          'stock'        => (integer)rand(0, 10000),
          'availability' => 1
          )
        );
    }
  }

}