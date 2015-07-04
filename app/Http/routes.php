<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*--------------------*   
 *                    *
 *      FRONTEND      *
 *                    *
 *--------------------*/
Route::group(
  [
  'namespace' => 'Front'
  ], function () {
    /*--------------------*   
     *        login       *
     *--------------------*/
    // show admin login form
    Route::get('login', array('middleware' => 'notLogin', 'uses' => 'FrontLoginController@showLogin'));
    // admin login action
    Route::post('login', array('middleware' => 'notLogin', 'uses' => 'FrontLoginController@doLogin'));
    // admin logout action
    Route::get('logout', array('uses' => 'FrontLoginController@doLogout'));

    // frontend's homepage
    Route::get('/', function () {
      return view('Front/Index/index');
    });

    // about page
    Route::get('about', function () {
      return view('Front/About/about');
    });

    // products page: show all products
    Route::get('products', function () {
      return view('Front/products');
    });

    // product's detail page: show single product
    // fix: enter with id
    Route::get('product', function () {
      return view('Front/product');
    });

    // articles page: show all articles
    Route::get('articles', function () {
      return view('Front/articles');
    });

    // article's detial page: show single article
    // fix: enter with id
    Route::get('article', function () {
      return view('article');
    });

    // cart page: show cart
    Route::get('cart', function () {
      return view('Front/cart');
    });

    // checkout page: show checkout
    Route::get('checkout', function () {
      return view('Front/checkout');
    });

    // my account page
    Route::get('account', function () {
        return view('Front/account');
    });

  });


/*-------------------*   
 *                   *
 *      BACKEND      *
 *                   *
 *-------------------*/
/*-------------------*   
 *       login       *
 *-------------------*/
Route::group(
  [
  'namespace' => 'Admin',
  'prefix' => 'admin'
  ], function () {
    // show admin login form
    Route::get('login', array('middleware' => 'notLogin', 'uses' => 'AdminLoginController@showLogin'));
    // admin login action
    Route::post('login', array('middleware' => 'notLogin', 'uses' => 'AdminLoginController@doLogin'));
    // admin logout action
    Route::get('logout', array('uses' => 'AdminLoginController@doLogout'));
  }
);

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
  // admin homepage
  Route::get('/', function () {
    return view('Admin/index');
  });

  /*---------------------*   
   *       product       *
   *---------------------*/

  // admin products page: show all products, CRUD
  Route::get('product/products', function () {
    return view('Admin/Product/products');
  });

  Route::get('product/category', array('uses' => 'Api\CategoryController@index'));
  Route::post('product/category/create', array('uses' => 'Api\CategoryController@create'));
  Route::post('product/category/destroy', array('uses' => 'Api\CategoryController@destroy'));

  // admin single product page: show single product, CRUD
  // fix: with id
  Route::get('product/product', function () {
    return view('Admin/product');
  });

  Route::controller('product/categoryContorller', 'Api\CategoryController');

  // admin articles page: show all articles, CRUD
  Route::get('articles', function () {
    return view('Admin/articles');
  });

  // admin single article page: show single article, CRUD
  // fix: with id
  Route::get('article', function () {
    return view('Admin/article');
  });

  // admin orders page: show all orders
  Route::get('orders', function () {
    return view('Admin/orders');
  });

  // admin single order page: show single order
  // fix: with id
  Route::get('order', function () {
    return view('Admin/order');
  });

  // admin users page: show all users
  Route::get('users', function () {
    return view('Admin/users');
  });
});
