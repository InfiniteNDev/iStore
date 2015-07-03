<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('users')->delete();
    User::create(array(
      'username' => 'user',
      'password' => Hash::make('user'),
      'name'     => 'user',
      'email'    => 'user@user.com',
      'type'    => '0'
    )
    );
    User::create(array(
      'username' => 'admin',
      'password' => Hash::make('admin'),
      'name'     => 'admin',
      'email'    => 'admin@admin.com',
      'type'    => '1'
    )
    );
  }

}