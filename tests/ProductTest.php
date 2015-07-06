<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class ProductTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        Auth::loginUsingId(8);

        $this -> visit('admin/product/products')
              -> seePageIs('admin/product/products')
              -> press('Update')
              // -> press('Delete')
              -> press('Edit');
    }
}
