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
          'availability' => 1,
          'image'        => 'assets/images/products/2d6c3b8f985e61fb962e80f73d5244e6.jpg'
          // 'image'        => $faker->image(
              // $dir = 'public/assets/images/products',
              // $width = 640,
              // $height = 480
            // )
          )
        );
    }
  }

}