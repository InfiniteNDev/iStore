<?php

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategoryTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('categories')->delete();

    $faker = Faker\Factory::create();
    // Category::truncate();

    foreach(range(1,20) as $index)
    {
      Category::create(
        array(
          'name' => $faker->name
          )
        );
    }
  }

}