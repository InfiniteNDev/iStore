<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use database\seeds\UserTableSeeder;
use database\seeds\AdminTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UserTableSeeder');

        Model::reguard();
    }
}
